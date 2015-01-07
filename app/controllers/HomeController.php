<?php
class HomeController extends BaseController {

	public function home(){

		
		Mail::send('emails.auth.test',array('name'=>'Tommy'),function($message){
			$message->to('ms.yeap91@gmail.com','Yeap')->subject('Test');

		});

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
