<?php
class HomeController extends BaseController {

	public function index(){

		$user=array();

		if(Auth::check()){
			$user=Auth::user();
		}

		return View::make('home')->with('user',$user);
	}

}
