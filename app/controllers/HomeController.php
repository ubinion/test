<?php
class HomeController extends BaseController {

	public function index(){

		$user=array();

		if(Auth::check())
			$user=Auth::user();
		else
			$user='N/A';

		if($user == 'N/A'){
			$photo_url='http://placehold.it/120x120';
			$uid=0;
		}
		else{
			$photo_url = $user->photo_url;
			$uid=$user->id;
		}

		return View::make('home')->with('user',$user)->with('uid',$uid)->with('photo_url',$photo_url);
	}
}
