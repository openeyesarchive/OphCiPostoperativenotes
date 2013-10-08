<?php

class DefaultController extends BaseEventTypeController
{
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	public function actionAddMedication()
	{
		$medication = new OphCiPostoperativenotes_Medication_Item;
		$medication->setDefaultOptions();

		$this->renderPartial('_medication_item_edit',array('medication'=>$medication));
	}

	public function getMedications($element)
	{
		if (!empty($_POST)) {
			$medications = array();

			if (!empty($_POST['medication_id'])) {
				foreach ($_POST['medication_id'] as $i => $medication_id) {
					$medication = new OphCiPostoperativenotes_Medication_Item;
					$medication->medication_id = $medication_id;
					$medication->time = $_POST['time'][$i];
					$medication->dose = $_POST['dose'][$i];
					$medication->route = $_POST['route'][$i];
					$medication->given_by = $_POST['given_by'][$i];

					$medications[] = $medication;
				}
			}

			return $medications;
		}

		return OphCiPostoperativenotes_Medication_Item::model()->findAll(array('order'=>'display_order','condition'=>'element_id=:element_id','params'=>array('element_id'=>$element->id)));
	}

	public function getItems($element) {
		$items = array();

		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if (is_string($value) && strlen($value) >0) {
					if (preg_match('/^gas_level_([0-9]+)_([0-9]+)$/',$key,$m)) {
						$item = new OphCiPostoperativenotes_Gas_Level;
					} elseif (preg_match('/^drug_([0-9]+)_([0-9]+)$/',$key,$m)) {
						$item = new OphCiPostoperativenotes_Drug_Dose;
					} elseif (preg_match('/^reading_([0-9]+)_([0-9]+)$/',$key,$m)) {
						$item = new OphCiPostoperativenotes_Reading;
					}

					if (isset($item)) {
						$item->item_id = $m[1];
						$item->offset = $m[2];
						$item->value = $value;

						$items[] = $item;

						unset($item);
					}
				}
			}
		} else if ($element->id) {
			$items = $element->items;
		}

		return $items;
	}

	protected function validatePOSTElements($elements)
	{
		$errors = parent::validatePOSTElements($elements);

		foreach ($elements as $element) {
			if ($element->getElementType()->class_name == 'Element_OphCiPostoperativenotes_RecoveryMonitoring') {
				foreach ($this->getItems(null) as $item) {
					if (!$item->validate()) {
						switch (get_class($item)) {
							case 'OphCiPostoperativenotes_Reading':
								$typeName = 'Reading'; break;
							case 'OphCiPostoperativenotes_Drug_Dose':
								$typeName = 'Drug dose'; break;
							case 'OphCiPostoperativenotes_Gas_Level':
								$typeName = 'Gas level'; break;
						}
						foreach ($item->getErrors() as $errormsgs) {
							foreach ($errormsgs as $error) {
								if ($item->item) {
									$errors[$typeName][] = "{$item->item->name}: $error";
								} else {
									$errors[$typeName][] = $error;
								}
							}
						}
					}
				}
			}
		}

		return $errors;
	}

	/*
	 * Process related items on event creation
	 */
	public function createElements($elements, $data, $firm, $patientId, $userId, $eventTypeId)
	{
		if ($id = parent::createElements($elements, $data, $firm, $patientId, $userId, $eventTypeId)) {
			$this->storePOSTManyToMany($elements);
		}

		return $id;
	}

	/*
	 * Process related items on event update
	 */
	public function updateElements($elements, $data, $event)
	{
		if (parent::updateElements($elements, $data, $event)) {
			// update has been successful, now need to deal with many to many changes
			$this->storePOSTManyToMany($elements);
		}
		return true;
	}

	/**
	 * (non-PHPdoc)
	 * @see BaseEventTypeController::setPOSTManyToMany()
	 */
	protected function setPOSTManyToMany($element)
	{
		if (get_class($element) == 'Element_OphCiPostoperativenotes_RecoveryMonitoring') {
			$drugs = array();
			$readings = array();

			foreach ($this->getItems($element) as $item) {
				if (get_class($item) == 'OphCiPostoperativenotes_Reading') {
					$readings[] = $item;
				} else {
					$drugs[] = $item;
				}
			}

			$element->drugs = $drugs;
			$element->readings = $readings;
		}
	}

	/*
	 * Store related items
	 */
	protected function storePOSTManyToMany($elements)
	{
		foreach ($elements as $element) {
			if (get_class($element) == 'Element_OphCiPostoperativenotes_RecoveryMonitoring') {
				$item_ids = array();
				foreach ($this->getItems(null) as $item) {
					$item->element_id = $element->id;

					if (!$item->save()) {
						throw new Exception("Unable to save related item: ".print_r($item->getErrors(),true));
					}

					if (!isset($item_ids[get_class($item)])) {
						$item_ids[get_class($item)] = array();
					}

					$item_ids[get_class($item)][] = $item->id;
				}

				foreach ($item_ids as $class => $ids) {
					$criteria = new CDbCriteria;
					$criteria->addCondition('element_id = :element_id');
					$criteria->addNotInCondition('id',$ids);
					$criteria->params[':element_id'] = $element->id;

					foreach ($class::model()->findAll($criteria) as $item) {
						if (!$item->delete()) {
							throw new Exception("Unable to delete $class: ".print_r($item->getErrors(),true));
						}
					}
				}
			}
		}
	}

	public function getGasItem($element, $gas, $offset)
	{
		if (!empty($_POST)) {
			$value = @$_POST['gas_level_'.$gas->id.'_'.$offset];

			return array(
				'colour' => $gas->getColourForValue($value),
				'level' => $value,
			);
		} else if ($element->id && $gas_level = OphCiPostoperativenotes_Gas_Level::model()->find('element_id=? and item_id=? and offset=?',array($element->id,$gas->id,$offset))) {
			$value = $gas_level->value;

			return array(
				'colour' => $gas->getColourForValue($value),
				'level' => $value,
			);
		}
	}

	public function getDrugItem($element, $drug, $offset)
	{
		if (!empty($_POST)) {
			return @$_POST['drug_'.$drug->id.'_'.$offset];
		}

		if ($element->id && $dose = OphCiPostoperativenotes_Drug_Dose::model()->find('element_id=? and item_id=? and offset=?',array($element->id,$drug->id,$offset))) {
			return $dose->value;
		}
	}

	public function getReadingItem($element, $reading_type, $offset)
	{
		if (!empty($_POST)) {
			return @$_POST['reading_'.$reading_type->id.'_'.$offset];
		}

		if ($element->id && $reading = OphCiPostoperativenotes_Reading::model()->find('element_id=? and item_id=? and offset=?',array($element->id,$reading_type->id,$offset))) {
			return $reading->value;
		}
	}
}
