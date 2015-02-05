<?php
class PrivacyTermsController extends BaseController {

	
	/*
	|	Privacy Page (get)
	*/
	public function getPrivacyPage(){

		return View::make('privacy_terms.privacy');
	}

		/*
	|	Terms Page (get)
	*/
	public function getTermsPage(){

		return View::make('privacy_terms.terms');
	}
}
