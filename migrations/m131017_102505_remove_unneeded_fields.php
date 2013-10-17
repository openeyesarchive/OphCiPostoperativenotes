<?php

class m131017_102505_remove_unneeded_fields extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_start_time','entered_recovery_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_end_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_start_time');
		$this->dropColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_end_time');
	}

	public function down()
	{
		$this->renameColumn('et_ophcipostoperativenotes_recovery_monitoring','entered_recovery_time','anaesthesia_start_time');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','anaesthesia_end_time','time not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_start_time','time not null');
		$this->addColumn('et_ophcipostoperativenotes_recovery_monitoring','surgery_end_time','time not null');
	}
}
