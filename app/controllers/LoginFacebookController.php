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

			die('No session from Redirect');
			return Redirect::to('/')->with("message","Failed, No Session From Redirect. Please Try again");

		}

		$user_fb= $this->fb->getGraphArray();

		if (empty($user_fb)){
			die('Fail to fetch data from fb');
			return Redirect::to('/')->with ('message','Fail to fetch data from Facebook.');
		}

		$user = User::whereFbUid($user_fb['id'])->first();

		//if user not found by uid
		if (empty($user)){

			//try find by email
			$user = User::whereEmail($user_fb['email'])->first();
			//if user found by email
			if ($user){
				echo 'Facebook Email found... <br>';
				//update facebook info to db
				$user->fb_uid				= $user_fb['id'];

				if((empty($user->gender)) AND !empty($user_fb['gender'])) 
					$user->gender 			= $user_fb['gender'];


				if((empty($user->birthday)) AND !empty($user_fb['birthday']))
					$user->birthday 		= $user_fb['birthday'];
					//$user->birthday=date(strtotime($user_fb['birthday']));

				if(empty($user->photo_url)) 
				$user->photo_url			='http://graph.facebook.com/'.$user_fb['id'].'/picture?type=large';

				if(!empty($user_fb['education'])){

					$totalSch=count($user_fb['education']);
					$user->uni_name 			= $user_fb['education'][--$totalSch]->school->name;
				}

				if(!empty($user_fb['work'])){

					$user->work_company 	= $user_fb['work'][0]->employer->name;
					$user->work_pos			= $user_fb['work'][0]->position->name;
				}			

				if(($user->active)==0)
				$user->active 				= 1;

				if(($user->fb_login)==0)
				$user->fb_login				= 1;

				if((empty($user->city_hometown)) AND !empty($user_fb['hometown']->name))
					$user->city_hometown 	= $user_fb['hometown']->name;

				if((empty($user->city_current)) AND !empty($user_fb['location']->name))
					$user->city_current 	= $user_fb['location']->name;


			}else{

				//redirect to facebook sign up page
				return Redirect::route('account-fb-signup')
					->with('user_fb',$user_fb->asArray());
			}

		}
		
		//user will reach here no matter update/create/found uid
		$user->fb_token = $this->fb->getToken();
		
		//save to the database
		$user->save();
		
		//attempt to login 
		Auth::login($user);

		//redirect to landing page
		return Redirect::intended('/')->with('global','<p class="text-success">Logged In</p>');

	}
}