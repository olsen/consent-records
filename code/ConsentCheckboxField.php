<?php

class ConsentCheckboxField extends CheckboxField {

	private static $consentIDFieldName = 'Email';
	private static $consentType = 'Form';

	public function __construct($name, $title = null, $consentIDFieldName = null, $consentType = null) {
		if($consentIDFieldName) {
			$this->setConsentIDField($consentIDFieldName);
		}
		if($consentType) {
			$this->setConsentType($consentType);
		}
		parent::__construct($name, $title);
	}
	public function Type() {
		return 'checkbox consentcheckbox';
	}
	public function setConsentIDFieldName($consentIDFieldName) {
		self::$consentIDFieldName = $consentIDFieldName;
		return $this;
	}
	public function getConsentIDFieldName() {
		return self::$consentIDFieldName;
	}
	public function Required() {
		if($this->form && ($validator = $this->form->Validator)) {
			$validator->addRequiredField($this->name);
		}
		return true;
	}
	public function getConsentType() {
		return self::$consentType;
	}
	public function setConsentType($consentType) {
		self::$consentType = $consentType;
		return $this;
	}
}