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
}
