<?php

class m131206_150640_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcipostoperativenotes_medications','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_medications_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_notes','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_notes_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_postop_progress_notes_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcipostoperativenotes_medications','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_medications_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_notes','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_notes_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_progress_notes','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_postop_progress_notes_version','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','deleted');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring_version','deleted');
	}
}
