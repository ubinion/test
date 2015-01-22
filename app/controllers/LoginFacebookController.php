<?php

class LoginFacebookController extends BaseController {

	private $fb;

	public function __construct(FacebookHelper $fb){

		$this ->fb = $fb;
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
		echo 'Facebook Uid found... <br>';

		//if user not found by uid
		if (empty($user)){

			//try find by email
			$user = User::whereEmail($user_fb->getProperty('email'))->first();
			//if user found by email
			if ($user){

				//update facebook info to db
				$user->uid_fb	= $user_fb->getProperty('id');

				if(empty($user->birthday))
					$user->birthday=date(strtotime($user_fb->getProperty('birthday')));

				$user->photo_url='http://graph.facebook.com/'.$user_fb->getProperty('id').'/picture?type=large';
				$user->active=1;
				$user->fb_login=1;


			}else{
				
				//if uid and email not found, create new user
				$user = new User;
				$user->uid_fb=$user_fb->getProperty('id');
				$user->email=$user_fb->getProperty('email');
				$user->first_name=$user_fb->getProperty('first_name');
				$user->last_name=$user_fb->getProperty('last_name');
				$user->birthday=date(strtotime($user_fb->getProperty('birthday')));
				$user->photo_url='http://graph.facebook.com/'.$user_fb->getProperty('id').'/picture?type=large';
				$user->active=1;
				$user->fb_login=1;

			}

			//save the user
			$user->save();
		}

		$user->fb_token=$this->fb->getToken();
		$user->save();

		Auth::login($user);

		return Redirect::to('/')->with('message','Logged In');
	}
	

}
