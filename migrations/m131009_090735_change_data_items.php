<?php

class m131009_090735_change_data_items extends OEMigration
{
	public function up()
	{
		$this->delete('ophcipostoperativenotes_reading');
		$this->delete('ophcipostoperativenotes_reading_type_field_type_option');
		$this->delete('ophcipostoperativenotes_reading_type');
		$this->delete('ophcipostoperativenotes_gas_level');
		$this->delete('ophcipostoperativenotes_gas');
		$this->delete('ophcipostoperativenotes_drug_dose');
		$this->delete('ophcipostoperativenotes_drug');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
	}
}
