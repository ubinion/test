<?php

class LoginFacebookController extends \BaseController {

	private $fb;

	public function __construct(FacebookHelper $fb){

		$this -> fb = $fb;
	}

	public function login(){
		return Redirect::to($this->fb->getUrlLogin());
	}

	public function callback(){
		
		if(!$this->fb->generateSessionFromRedirect()){
			//if no session

			return Redirect::to('/')->with("message","No Session");

		}

		$user_fb= $this->fb->getGraph();

		if (empty($user_fb)){

			return Redirect::to('/')->with ('message','Fail to fetch data from Facebook.');
		}

		$user = User::whereUidFb($user_fb->getProperty('id'))->first();

		if (empty($user)){

			$user = new User;
			$user->uid_fb=$user_fb->getProperty('id');
			$user->email=$user_fb->getProperty('email');
			$user->first_name=$user_fb->getProperty('first_name');
			$user->last_name=$user_fb->getProperty('last_name');
			//$user->uid_fb=$user_fb->getProperty('uid_fb');
			$user->birthday=date(strtotime($user_fb->getProperty('birthday')));
			$user->photo_url='http://graph.facebook.com/'.$user_fb->getProperty('id').'/picture?type=large';
			/*$user->fb_token=$user_fb->getProperty('fb_token');
			$user->remember_token=$user_fb->getProperty('remember_token');*/

			$user->save();
		}

		$user->fb_token=$this->fb->getToken();
		$user->save();

		Auth::login($user);

		return Redirect::to('/')->with('message','Logged In');
	}
	

}
