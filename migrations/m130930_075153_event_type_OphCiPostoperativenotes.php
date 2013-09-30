<?php 
class m130930_075153_event_type_OphCiPostoperativenotes extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPostoperativenotes'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiPostoperativenotes', 'name' => 'Post operative notes','event_group_id' => $group['id']));
		}
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPostoperativenotes'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Post operative notes',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Post operative notes','class_name' => 'Element_OphCiPostoperativenotes_PostOperativeNotes', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Post operative notes'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Recovery monitoring',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Recovery monitoring','class_name' => 'Element_OphCiPostoperativenotes_RecoveryMonitoring', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Recovery monitoring'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Post operative progress notes',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Post operative progress notes','class_name' => 'Element_OphCiPostoperativenotes_PostOperativeProgressNotes', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Post operative progress notes'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Medications',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Medications','class_name' => 'Element_OphCiPostoperativenotes_Medications', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Medications'))->queryRow();

		$this->createTable('et_ophcipostoperativenotes_postop_notes', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'recovery_discharge' => 'tinyint(1) unsigned NOT NULL',
				'iv_cannula_removed' => 'tinyint(1) unsigned NOT NULL',
				'ecg_dots_removed' => 'tinyint(1) unsigned NOT NULL',
				'patient_able_to_walk' => 'tinyint(1) unsigned NOT NULL',
				'post_op_education' => 'tinyint(1) unsigned NOT NULL',
				'eye_dressing_in_place' => 'tinyint(1) unsigned NOT NULL',
				'take_home_medications' => 'tinyint(1) unsigned NOT NULL',
				'take_home_analgesics' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcipostoperativenotes_postop_notes_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcipostoperativenotes_postop_notes_cui_fk` (`created_user_id`)',
				'KEY `et_ophcipostoperativenotes_postop_notes_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcipostoperativenotes_recovery_monitoring', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'heart_rate' => 'int(10) unsigned NOT NULL',
				'blood_pressure' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'rr' => 'int(10) unsigned NOT NULL',
				'sao2' => 'int(10) unsigned NOT NULL',
				'o2_lmin' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'temp' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'pain_score' => 'int(10) unsigned NOT NULL',
				'nausea_vomiting' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'blood_loss' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'mews_score' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcipostoperativenotes_recovery_monitoring_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcipostoperativenotes_recovery_monitoring_cui_fk` (`created_user_id`)',
				'KEY `et_ophcipostoperativenotes_recovery_monitoring_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_recovery_monitoring_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_recovery_monitoring_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_recovery_monitoring_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcipostoperativenotes_postop_progress_notes', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'text' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcipostoperativenotes_postop_progress_notes_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcipostoperativenotes_postop_progress_notes_cui_fk` (`created_user_id`)',
				'KEY `et_ophcipostoperativenotes_postop_progress_notes_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_progress_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_progress_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_postop_progress_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcipostoperativenotes_medications', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcipostoperativenotes_medications_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcipostoperativenotes_medications_cui_fk` (`created_user_id`)',
				'KEY `et_ophcipostoperativenotes_medications_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcipostoperativenotes_medications_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_medication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_medication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_medication_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcipostoperativenotes_medication',array('name'=>'Acetaminophen','display_order'=>1));
		$this->insert('ophcipostoperativenotes_medication',array('name'=>'Ibuprofen','display_order'=>2));
		$this->insert('ophcipostoperativenotes_medication',array('name'=>'Ondansetron','display_order'=>3));

		$this->createTable('ophcipostoperativenotes_medication_item', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'medication_id' => 'int(10) unsigned NOT NULL',
				'time' => 'time NOT NULL',
				'dose' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'route' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'given_by' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_medication_item_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_medication_item_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_medication_item_ele_fk` (`element_id`)',
				'KEY `ophcipostoperativenotes_medication_item_med_fk` (`medication_id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_item_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_item_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_item_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_medications` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_medication_item_med_fk` FOREIGN KEY (`medication_id`) REFERENCES `ophcipostoperativenotes_medication` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcipostoperativenotes_medication_item');
		$this->dropTable('ophcipostoperativenotes_medication');
		$this->dropTable('et_ophcipostoperativenotes_postop_notes');
		$this->dropTable('et_ophcipostoperativenotes_recovery_monitoring');
		$this->dropTable('et_ophcipostoperativenotes_postop_progress_notes');
		$this->dropTable('et_ophcipostoperativenotes_medications');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPostoperativenotes'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}
