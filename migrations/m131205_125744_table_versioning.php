<?php

class m131205_125744_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcipostoperativenotes_medications_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcipostoperativenotes_medications_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcipostoperativenotes_medications_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcipostoperativenotes_medications_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_medications_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_medications_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_medications_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcipostoperativenotes_medications_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcipostoperativenotes_medications_version');

		$this->createIndex('et_ophcipostoperativenotes_medications_aid_fk','et_ophcipostoperativenotes_medications_version','id');
		$this->addForeignKey('et_ophcipostoperativenotes_medications_aid_fk','et_ophcipostoperativenotes_medications_version','id','et_ophcipostoperativenotes_medications','id');

		$this->addColumn('et_ophcipostoperativenotes_medications_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcipostoperativenotes_medications_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcipostoperativenotes_medications_version','version_id');
		$this->alterColumn('et_ophcipostoperativenotes_medications_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcipostoperativenotes_postop_notes_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`recovery_discharge` tinyint(1) unsigned NOT NULL,
	`iv_cannula_removed` tinyint(1) unsigned NOT NULL,
	`ecg_dots_removed` tinyint(1) unsigned NOT NULL,
	`patient_able_to_walk` tinyint(1) unsigned NOT NULL,
	`post_op_education` tinyint(1) unsigned NOT NULL,
	`eye_dressing_in_place` tinyint(1) unsigned NOT NULL,
	`take_home_medications` tinyint(1) unsigned NOT NULL,
	`take_home_analgesics` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcipostoperativenotes_postop_notes_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcipostoperativenotes_postop_notes_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcipostoperativenotes_postop_notes_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcipostoperativenotes_postop_notes_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcipostoperativenotes_postop_notes_version');

		$this->createIndex('et_ophcipostoperativenotes_postop_notes_aid_fk','et_ophcipostoperativenotes_postop_notes_version','id');
		$this->addForeignKey('et_ophcipostoperativenotes_postop_notes_aid_fk','et_ophcipostoperativenotes_postop_notes_version','id','et_ophcipostoperativenotes_postop_notes','id');

		$this->addColumn('et_ophcipostoperativenotes_postop_notes_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcipostoperativenotes_postop_notes_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcipostoperativenotes_postop_notes_version','version_id');
		$this->alterColumn('et_ophcipostoperativenotes_postop_notes_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcipostoperativenotes_postop_progress_notes_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`text` text COLLATE utf8_bin,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcipostoperativenotes_postop_progress_notes_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcipostoperativenotes_postop_progress_notes_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcipostoperativenotes_postop_progress_notes_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_progress_notes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_progress_notes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_postop_progress_notes_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcipostoperativenotes_postop_progress_notes_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcipostoperativenotes_postop_progress_notes_version');

		$this->createIndex('et_ophcipostoperativenotes_postop_progress_notes_aid_fk','et_ophcipostoperativenotes_postop_progress_notes_version','id');
		$this->addForeignKey('et_ophcipostoperativenotes_postop_progress_notes_aid_fk','et_ophcipostoperativenotes_postop_progress_notes_version','id','et_ophcipostoperativenotes_postop_progress_notes','id');

		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcipostoperativenotes_postop_progress_notes_version','version_id');
		$this->alterColumn('et_ophcipostoperativenotes_postop_progress_notes_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcipostoperativenotes_recovery_monitoring_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`entered_recovery_time` time NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcipostoperativenotes_recovery_monitoring_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcipostoperativenotes_recovery_monitoring_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcipostoperativenotes_recovery_monitoring_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_recovery_monitoring_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_recovery_monitoring_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcipostoperativenotes_recovery_monitoring_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcipostoperativenotes_recovery_monitoring_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcipostoperativenotes_recovery_monitoring_version');

		$this->createIndex('et_ophcipostoperativenotes_recovery_monitoring_aid_fk','et_ophcipostoperativenotes_recovery_monitoring_version','id');
		$this->addForeignKey('et_ophcipostoperativenotes_recovery_monitoring_aid_fk','et_ophcipostoperativenotes_recovery_monitoring_version','id','et_ophcipostoperativenotes_recovery_monitoring','id');

		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcipostoperativenotes_recovery_monitoring_version','version_id');
		$this->alterColumn('et_ophcipostoperativenotes_recovery_monitoring_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_drug_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`unit` varchar(16) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_drug_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_drug_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_drug_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_drug_version');

		$this->createIndex('ophcipostoperativenotes_drug_aid_fk','ophcipostoperativenotes_drug_version','id');
		$this->addForeignKey('ophcipostoperativenotes_drug_aid_fk','ophcipostoperativenotes_drug_version','id','ophcipostoperativenotes_drug','id');

		$this->addColumn('ophcipostoperativenotes_drug_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_drug_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_drug_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_drug_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_drug_dose_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`item_id` int(10) unsigned NOT NULL,
	`value` varchar(16) COLLATE utf8_bin NOT NULL,
	`offset` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_drug_dose_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_drug_dose_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_drug_dose_rt_fk` (`item_id`),
	KEY `acv_ophcipostoperativenotes_drug_dose_el_fk` (`element_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_dose_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_dose_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_dose_rt_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_drug` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_drug_dose_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_drug_dose_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_drug_dose_version');

		$this->createIndex('ophcipostoperativenotes_drug_dose_aid_fk','ophcipostoperativenotes_drug_dose_version','id');
		$this->addForeignKey('ophcipostoperativenotes_drug_dose_aid_fk','ophcipostoperativenotes_drug_dose_version','id','ophcipostoperativenotes_drug_dose','id');

		$this->addColumn('ophcipostoperativenotes_drug_dose_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_drug_dose_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_drug_dose_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_drug_dose_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_gas_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`field_type_id` int(10) unsigned NOT NULL,
	`unit` varchar(16) COLLATE utf8_bin NOT NULL,
	`min` tinyint(1) unsigned DEFAULT NULL,
	`max` tinyint(1) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_gas_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_gas_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_gas_lft_fk` (`field_type_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_lft_fk` FOREIGN KEY (`field_type_id`) REFERENCES `ophcipostoperativenotes_gas_field_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_gas_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_gas_version');

		$this->createIndex('ophcipostoperativenotes_gas_aid_fk','ophcipostoperativenotes_gas_version','id');
		$this->addForeignKey('ophcipostoperativenotes_gas_aid_fk','ophcipostoperativenotes_gas_version','id','ophcipostoperativenotes_gas','id');

		$this->addColumn('ophcipostoperativenotes_gas_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_gas_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_gas_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_gas_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_gas_field_type_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_gas_ft_ft_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_gas_ft_ft_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_ft_ft_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_ft_ft_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_gas_field_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_gas_field_type_version');

		$this->createIndex('ophcipostoperativenotes_gas_field_type_aid_fk','ophcipostoperativenotes_gas_field_type_version','id');
		$this->addForeignKey('ophcipostoperativenotes_gas_field_type_aid_fk','ophcipostoperativenotes_gas_field_type_version','id','ophcipostoperativenotes_gas_field_type','id');

		$this->addColumn('ophcipostoperativenotes_gas_field_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_gas_field_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_gas_field_type_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_gas_field_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_gas_level_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`item_id` int(10) unsigned NOT NULL,
	`value` varchar(64) COLLATE utf8_bin NOT NULL,
	`offset` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_gas_level_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_gas_level_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_gas_level_el_fk` (`element_id`),
	KEY `acv_ophcipostoperativenotes_gas_level_gai_fk` (`item_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_level_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_level_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_level_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_gas_level_gai_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_gas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_gas_level_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_gas_level_version');

		$this->createIndex('ophcipostoperativenotes_gas_level_aid_fk','ophcipostoperativenotes_gas_level_version','id');
		$this->addForeignKey('ophcipostoperativenotes_gas_level_aid_fk','ophcipostoperativenotes_gas_level_version','id','ophcipostoperativenotes_gas_level','id');

		$this->addColumn('ophcipostoperativenotes_gas_level_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_gas_level_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_gas_level_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_gas_level_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_medication_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_medication_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_medication_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_medication_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_medication_version');

		$this->createIndex('ophcipostoperativenotes_medication_aid_fk','ophcipostoperativenotes_medication_version','id');
		$this->addForeignKey('ophcipostoperativenotes_medication_aid_fk','ophcipostoperativenotes_medication_version','id','ophcipostoperativenotes_medication','id');

		$this->addColumn('ophcipostoperativenotes_medication_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_medication_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_medication_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_medication_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_medication_item_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`medication_id` int(10) unsigned NOT NULL,
	`time` time NOT NULL,
	`dose` varchar(64) COLLATE utf8_bin NOT NULL,
	`route` varchar(64) COLLATE utf8_bin NOT NULL,
	`given_by` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_medication_item_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_medication_item_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_medication_item_ele_fk` (`element_id`),
	KEY `acv_ophcipostoperativenotes_medication_item_med_fk` (`medication_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_item_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_item_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_item_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_medications` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_medication_item_med_fk` FOREIGN KEY (`medication_id`) REFERENCES `ophcipostoperativenotes_medication` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_medication_item_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_medication_item_version');

		$this->createIndex('ophcipostoperativenotes_medication_item_aid_fk','ophcipostoperativenotes_medication_item_version','id');
		$this->addForeignKey('ophcipostoperativenotes_medication_item_aid_fk','ophcipostoperativenotes_medication_item_version','id','ophcipostoperativenotes_medication_item','id');

		$this->addColumn('ophcipostoperativenotes_medication_item_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_medication_item_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_medication_item_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_medication_item_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_reading_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`item_id` int(10) unsigned NOT NULL,
	`reading_time` time NOT NULL,
	`value` varchar(16) COLLATE utf8_bin NOT NULL,
	`offset` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_reading_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_rt_fk` (`item_id`),
	KEY `acv_ophcipostoperativenotes_reading_el_fk` (`element_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_rt_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcipostoperativenotes_reading_type` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_el_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcipostoperativenotes_recovery_monitoring` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_reading_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_reading_version');

		$this->createIndex('ophcipostoperativenotes_reading_aid_fk','ophcipostoperativenotes_reading_version','id');
		$this->addForeignKey('ophcipostoperativenotes_reading_aid_fk','ophcipostoperativenotes_reading_version','id','ophcipostoperativenotes_reading','id');

		$this->addColumn('ophcipostoperativenotes_reading_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_reading_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_reading_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_reading_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_reading_type_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`unit` varchar(32) COLLATE utf8_bin NOT NULL,
	`validation_regex` varchar(64) COLLATE utf8_bin NOT NULL,
	`validation_message` varchar(64) COLLATE utf8_bin NOT NULL,
	`field_type_id` int(10) unsigned NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_reading_type_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_type_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_type_fti_fk` (`field_type_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_type_fti_fk` FOREIGN KEY (`field_type_id`) REFERENCES `ophcipostoperativenotes_reading_type_field_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_reading_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_reading_type_version');

		$this->createIndex('ophcipostoperativenotes_reading_type_aid_fk','ophcipostoperativenotes_reading_type_version','id');
		$this->addForeignKey('ophcipostoperativenotes_reading_type_aid_fk','ophcipostoperativenotes_reading_type_version','id','ophcipostoperativenotes_reading_type','id');

		$this->addColumn('ophcipostoperativenotes_reading_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_reading_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_reading_type_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_reading_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_reading_type_field_type_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_reading_tft_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_tft_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_tft_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_tft_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_reading_type_field_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_reading_type_field_type_version');

		$this->createIndex('ophcipostoperativenotes_reading_type_field_type_aid_fk','ophcipostoperativenotes_reading_type_field_type_version','id');
		$this->addForeignKey('ophcipostoperativenotes_reading_type_field_type_aid_fk','ophcipostoperativenotes_reading_type_field_type_version','id','ophcipostoperativenotes_reading_type_field_type','id');

		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_reading_type_field_type_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_reading_type_field_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcipostoperativenotes_reading_type_field_type_option_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`reading_type_id` int(10) unsigned NOT NULL,
	`name` varchar(64) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcipostoperativenotes_reading_tfto_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_tfto_cui_fk` (`created_user_id`),
	KEY `acv_ophcipostoperativenotes_reading_tfto_fti_fk` (`reading_type_id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_tfto_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_tfto_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcipostoperativenotes_reading_tfto_fti_fk` FOREIGN KEY (`reading_type_id`) REFERENCES `ophcipostoperativenotes_reading_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophcipostoperativenotes_reading_type_field_type_option_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcipostoperativenotes_reading_type_field_type_option_version');

		$this->createIndex('ophcipostoperativenotes_reading_type_field_type_option_aid_fk','ophcipostoperativenotes_reading_type_field_type_option_version','id');
		$this->addForeignKey('ophcipostoperativenotes_reading_type_field_type_option_aid_fk','ophcipostoperativenotes_reading_type_field_type_option_version','id','ophcipostoperativenotes_reading_type_field_type_option','id');

		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_option_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_option_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcipostoperativenotes_reading_type_field_type_option_version','version_id');
		$this->alterColumn('ophcipostoperativenotes_reading_type_field_type_option_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophcipostoperativenotes_medications','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_medications_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_notes','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_notes_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophcipostoperativenotes_drug','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_drug_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_drug_dose','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_drug_dose_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas_field_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas_field_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas_level','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_gas_level_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_medication','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_medication_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_medication_item','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_medication_item_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type_field_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_option','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcipostoperativenotes_reading_type_field_type_option_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcipostoperativenotes_drug','deleted');
		$this->dropColumn('ophcipostoperativenotes_drug_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_drug_dose','deleted');
		$this->dropColumn('ophcipostoperativenotes_drug_dose_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas_field_type','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas_field_type_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas_level','deleted');
		$this->dropColumn('ophcipostoperativenotes_gas_level_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_medication','deleted');
		$this->dropColumn('ophcipostoperativenotes_medication_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_medication_item','deleted');
		$this->dropColumn('ophcipostoperativenotes_medication_item_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type_field_type','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type_field_type_version','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type_field_type_option','deleted');
		$this->dropColumn('ophcipostoperativenotes_reading_type_field_type_option_version','deleted');

		$this->dropColumn('et_ophcipostoperativenotes_medications','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_medications_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_notes','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_notes_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_progress_notes','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_progress_notes_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring_version','deleted');

		$this->dropTable('et_ophcipostoperativenotes_medications_version');
		$this->dropTable('et_ophcipostoperativenotes_postop_notes_version');
		$this->dropTable('et_ophcipostoperativenotes_postop_progress_notes_version');
		$this->dropTable('et_ophcipostoperativenotes_recovery_monitoring_version');
		$this->dropTable('ophcipostoperativenotes_drug_version');
		$this->dropTable('ophcipostoperativenotes_drug_dose_version');
		$this->dropTable('ophcipostoperativenotes_gas_version');
		$this->dropTable('ophcipostoperativenotes_gas_field_type_version');
		$this->dropTable('ophcipostoperativenotes_gas_level_version');
		$this->dropTable('ophcipostoperativenotes_medication_version');
		$this->dropTable('ophcipostoperativenotes_medication_item_version');
		$this->dropTable('ophcipostoperativenotes_reading_version');
		$this->dropTable('ophcipostoperativenotes_reading_type_version');
		$this->dropTable('ophcipostoperativenotes_reading_type_field_type_version');
		$this->dropTable('ophcipostoperativenotes_reading_type_field_type_option_version');
	}
}
