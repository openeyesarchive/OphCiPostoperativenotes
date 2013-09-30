<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcipostoperativenotes_recovery_monitoring".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $heart_rate
 * @property string $blood_pressure
 * @property integer $rr
 * @property integer $sao2
 * @property string $o2_lmin
 * @property string $temp
 * @property integer $pain_score
 * @property string $nausea_vomiting
 * @property string $blood_loss
 * @property string $mews_score
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiPostoperativenotes_RecoveryMonitoring extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcipostoperativenotes_recovery_monitoring';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, heart_rate, blood_pressure, rr, sao2, o2_lmin, temp, pain_score, nausea_vomiting, blood_loss, mews_score, ', 'safe'),
			array('heart_rate, blood_pressure, rr, sao2, o2_lmin, temp, pain_score, nausea_vomiting, blood_loss, mews_score, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, heart_rate, blood_pressure, rr, sao2, o2_lmin, temp, pain_score, nausea_vomiting, blood_loss, mews_score, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'heart_rate' => 'Heart rate',
			'blood_pressure' => 'Blood pressure',
			'rr' => 'RR',
			'sao2' => 'SaO2',
			'o2_lmin' => 'O2 L min',
			'temp' => 'Temp oC oF',
			'pain_score' => 'Pain score',
			'nausea_vomiting' => 'Nausea vomiting',
			'blood_loss' => 'Blood loss',
			'mews_score' => 'MEWS score',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('heart_rate', $this->heart_rate);
		$criteria->compare('blood_pressure', $this->blood_pressure);
		$criteria->compare('rr', $this->rr);
		$criteria->compare('sao2', $this->sao2);
		$criteria->compare('o2_lmin', $this->o2_lmin);
		$criteria->compare('temp', $this->temp);
		$criteria->compare('pain_score', $this->pain_score);
		$criteria->compare('nausea_vomiting', $this->nausea_vomiting);
		$criteria->compare('blood_loss', $this->blood_loss);
		$criteria->compare('mews_score', $this->mews_score);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>