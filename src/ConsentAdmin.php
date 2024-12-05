<?php

namespace Mouseketeers\ConsentRecords;

use SilverStripe\Admin\ModelAdmin;

class ConsentAdmin extends ModelAdmin {

	private static $menu_icon = '/consent-records/images/paragraf-symbol.svg';
	
	private static $managed_models = [
		'ConsentRecord'
	];
	private static $url_segment = 'consents';

	private static $menu_title = 'User Consents';

	public function subsiteCMSShowInMenu() {
		return true;
	}
}