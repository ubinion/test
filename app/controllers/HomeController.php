<?php
class HomeController extends BaseController {

	public function home(){

		return View::make('home');
	}

	public function index(){

		$data=array();

		if(Auth::check()){
			$data=Auth::user();
		}

		return View::make('index')->with('data',$data);
	}

	public function logout(){
		
		Auth::logout();
		return Redirect::to('/');
	}

}
