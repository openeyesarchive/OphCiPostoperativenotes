<?php

class m140205_153414_remove_soft_deletion_from_models_that_dont_need_it extends CDbMigration
{
	public $tables = array(
		'et_ophcipostoperativenotes_medications',
		'et_ophcipostoperativenotes_postop_notes',
		'et_ophcipostoperativenotes_postop_progress_notes',
		'et_ophcipostoperativenotes_recovery_monitoring',
		'ophcipostoperativenotes_drug_dose',
		'ophcipostoperativenotes_gas_level',
		'ophcipostoperativenotes_medication_item',
		'ophcipostoperativenotes_reading',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'deleted');
			$this->dropColumn($table.'_version','deleted');

			$this->dropForeignKey("{$table}_aid_fk",$table."_version");
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'deleted','tinyint(1) unsigned not null');
			$this->addColumn($table."_version",'deleted','tinyint(1) unsigned not null');

			$this->addForeignKey("{$table}_aid_fk",$table."_version","id",$table,"id");
		}
	}
}
