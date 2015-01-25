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

			return Redirect::to('/')->with("message","Failed, No Session From Redirect. Please Try again");

		}

		$user_fb= $this->fb->getGraph();

		if (empty($user_fb)){

			return Redirect::to('/')->with ('message','Fail to fetch data from Facebook.');
		}

		$user = User::whereFbUid($user_fb->getProperty('id'))->first();
		echo 'Facebook Uid found... <br>';

		//if user not found by uid
		if (empty($user)){

			//try find by email
			$user = User::whereEmail($user_fb->getProperty('email'))->first();
			//if user found by email
			if ($user){

				//update facebook info to db
				$user->fb_uid	= $user_fb->getProperty('id');

				if(empty($user->birthday))
					$user->birthday=$user_fb->getProperty('birthday');
					//$user->birthday=date(strtotime($user_fb->getProperty('birthday')));

				$user->photo_url='http://graph.facebook.com/'.$user_fb->getProperty('id').'/picture?type=large';
				$user->active=1;
				$user->fb_login=1;


			}else{

				//redirect to facebook sign up page
				return Redirect::route('account-fb-signup')
					->with('user_fb',$user_fb->asArray());
			}

			//save the user
			$user->save();
		}

		//user will reach here no matter update/create/found uid
		$user->fb_token=$this->fb->getToken();
		$user->save();

		//Auth::login($user);

		//return Redirect::to('/')->with('message','Logged In');

		$remember = false; 

		//auth user to login
		$auth =	Auth::attempt(array(
			'fb_uid'		=>	$user_fb->getProperty('id'),
			'fb_login'	=>	1,
			'active' 	=>	1
		), $remember);

		if($auth){
			//redirect to home page
			return Redirect::intended('/')
				->with('global','<p class="text-success">Logged In</p>');
		}
	}
	

}
