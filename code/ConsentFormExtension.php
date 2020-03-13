<?php 
class ConsentFormExtension extends Extension {

	private static $ignoredFields = array(
		'ConsentCheckboxField',
		'HiddenField',
		'BackURL',
		'PasswordField',
		'ConfirmedPasswordField'
	);

	public function afterCallActionHandler($request, $action) {

		$form = $this->owner;
		$fields = $form->Fields();
		
		$consentFields = [];

		foreach($fields as $field) {
			if($field->class == 'ConsentCheckboxField') {
				$consentFields[] = $field;
			}
		}
		if(!$consentFields) return;

		$formData = [];
		$vars = $form->request->getVars();
		
		foreach($fields as $field) {
			if(in_array($field->class, self::$ignoredFields)) {
				continue;
			}
			$key = ($field->title) ? $field->title : $field->name;
			$value = $field->dataValue();
			if($value) {
				$formData[] = $key . ': ' . $value;	
			}
		}

		foreach ($consentFields as $consentField) {
			
			$consentIDFieldName = $consentField->getConsentIDFieldName();
			$consentIDField = $fields->fieldByName($consentIDFieldName);
			$consentType = $consentField->getConsentType();

			$consentRecord = new ConsentRecord();
			$consentRecord->ConsentID = $consentIDField->dataValue();
			$consentRecord->ConsentType = $consentType;
			$consentRecord->URL = Director::absoluteURL($vars['url']);
			$consentRecord->ConsentStatement = $consentField->title;
			$consentRecord->ConsentData = implode(', ', $formData);

			$consentRecord->write();
		}
	}	
}
