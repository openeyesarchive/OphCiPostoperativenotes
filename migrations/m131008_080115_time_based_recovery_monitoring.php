<?php

class m131008_080115_time_based_recovery_monitoring extends OEMigration
{
	public function up()
	{
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','heart_rate');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','blood_pressure');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','rr');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','sao2');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','o2_lmin');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','temp');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','pain_score');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','nausea_vomiting');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','blood_loss');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','mews_score');

		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_start_time','time not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_end_time','time not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_start_time','time not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_end_time','time not null');

		$this->createTable('ophcipostoperativenotes_reading_type_field_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_reading_tft_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_reading_tft_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_tft_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_tft_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_reading_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'unit' => 'varchar(32) collate utf8_bin not null',
				'validation_regex' => 'varchar(64) collate utf8_bin not null',
				'validation_message' => 'varchar(64) collate utf8_bin not null',
				'field_type_id' => 'int(10) unsigned NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_reading_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_reading_type_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_reading_type_fti_fk` (`field_type_id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_type_fti_fk` FOREIGN KEY (`field_type_id`) REFERENCES `ophcipostoperativenotes_reading_type_field_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_reading', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'item_id' => 'int(10) unsigned NOT NULL',
				'reading_time' => 'time NOT NULL',
				'value' => 'varchar(16) COLLATE utf8_bin NOT NULL',
				'offset' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_reading_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_reading_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_reading_rt_fk` (`item_id`)',
				'KEY `ophcipostoperativenotes_reading_el_fk` (`element_id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_rt_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_reading_type` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_drug', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'unit' => 'varchar(16) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_drug_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_drug_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_drug_dose', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'item_id' => 'int(10) unsigned NOT NULL',
				'value' => 'varchar(16) COLLATE utf8_bin NOT NULL',
				'offset' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_drug_dose_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_drug_dose_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_drug_dose_rt_fk` (`item_id`)',
				'KEY `ophcipostoperativenotes_drug_dose_el_fk` (`element_id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_dose_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_dose_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_dose_rt_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_drug` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_drug_dose_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_gas_field_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_gas_ft_ft_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_gas_ft_ft_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_ft_ft_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_ft_ft_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_gas', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'field_type_id' => 'int(10) unsigned NOT NULL',
				'unit' => 'varchar(16) COLLATE utf8_bin NOT NULL',
				'min' => 'tinyint(1) unsigned NULL',
				'max' => 'tinyint(1) unsigned NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_gas_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_gas_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_gas_lft_fk` (`field_type_id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_lft_fk` FOREIGN KEY (`field_type_id`) REFERENCES `ophcipostoperativenotes_gas_field_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_gas_level', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'item_id' => 'int(10) unsigned NOT NULL',
				'value' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'offset' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_gas_level_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_gas_level_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_gas_level_el_fk` (`element_id`)',
				'KEY `ophcipostoperativenotes_gas_level_gai_fk` (`item_id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_level_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_level_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_level_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_gas_level_gai_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_gas` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcipostoperativenotes_reading_type_field_type_option', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'reading_type_id' => 'int(10) unsigned NOT NULL',
				'name' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcipostoperativenotes_reading_tfto_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcipostoperativenotes_reading_tfto_cui_fk` (`created_user_id`)',
				'KEY `ophcipostoperativenotes_reading_tfto_fti_fk` (`reading_type_id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_tfto_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_tfto_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcipostoperativenotes_reading_tfto_fti_fk` FOREIGN KEY (`reading_type_id`) REFERENCES `ophcipostoperativenotes_reading_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->dropTable('ophcipostoperativenotes_reading_type_field_type_option');
		$this->dropTable('ophcipostoperativenotes_reading');
		$this->dropTable('ophcipostoperativenotes_reading_type');
		$this->dropTable('ophcipostoperativenotes_reading_type_field_type');
		$this->dropTable('ophcipostoperativenotes_gas_level');
		$this->dropTable('ophcipostoperativenotes_gas');
		$this->dropTable('ophcipostoperativenotes_gas_field_type');
		$this->dropTable('ophcipostoperativenotes_drug_dose');
		$this->dropTable('ophcipostoperativenotes_drug');

		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_start_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_end_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_start_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_end_time');

		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','heart_rate','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','blood_pressure','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','rr','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','sao2','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','o2_lmin','varchar(255) collate utf8_bin');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','temp','varchar(255) collate utf8_bin');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','pain_score','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','nausea_vomiting','varchar(255) collate utf8_bin');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','blood_loss','varchar(255) collate utf8_bin');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','mews_score','varchar(255) collate utf8_bin');
	}
}
