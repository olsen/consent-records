<?php
class UserConsentReport extends SS_Report {

	private $columns_cache = array();
	
	function title() {
		return 'User Consent Records';
	}
	function description() {
		return 'This report shows user consent records';
	}
	public function sourceRecords($params = null) {
		return ConsentRecord::get();
	}
	public function columns() {
		return array(
			'ConsentID' => 'Consent ID',
			'Created' => 'Created',
			'ConsentStatement' => 'Consent Statement',
			'ConsentType' => 'Type',
			'ConsentData' => 'Data',
			'URL' => 'URL'
		);
	}
}