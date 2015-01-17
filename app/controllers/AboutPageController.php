<?php
class AboutPageController extends BaseController {

	
	/*
	|	About Page (get)
	*/
	public function getAboutPage(){

		return View::make('about.about');
	}

	
}
