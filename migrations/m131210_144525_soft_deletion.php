<?php

class m131210_144525_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}
}
