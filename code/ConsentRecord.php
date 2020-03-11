<?php

class ConsentRecord extends DataObject {
	private static $db = array(
		'ConsentID' => 'Varchar(255)',
		'ConsentStatement' => 'Text',
		'ConsentData' => 'Varchar(255)',
		'ConsentType' => 'Varchar(255)',
		'URL' => 'Varchar(255)'
	);
}