<?php
class AccountController extends BaseController {

	public function getCreate(){
		return View::make('account.create');
	}
	

	public function postCreate(){

		$validator = Validator::make(Input::all(),
			array(
				'email'		=>'required | max:50 | email | unique:users',
				'uid_fb'	=>'required | max:20 | min:3 | unique:users',
				'first_name'=>'required',
				'last_name'	=>'required',
				'password'	=>'required | min:6',
				'password2'	=>'required | same:password'
			));

		if ($validator->fails()){

			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		}
		else{
			$email		=	Input::get('email');
			$uid_fb		=	Input::get('uid_fb');
			$first_name	=	Input::get('first_name');
			$last_name	=	Input::get('last_name');
			$password	=	Input::get('password');

			//activation code
			$code		=	str_random(60);

			$user 	=	User::create(array(
				'email'			=>	$email,
				'uid_fb'		=>	$uid_fb,
				'first_name'	=>	$first_name,
				'last_name'		=>	$last_name,
				'password'		=>	Hash::make($password),
				'activate_code'	=>	$code,
				'active'		=>	0

			));

			if($user){

				//send activation mail
				Mail::send('emails.auth.activate_mail', array('link'=> URL::route('account-activate',$code), 'name'=>$last_name),function($message) use ($user){
						$message->to($user->email, $user->last_name)->subject('Verification email has been sent to '.$user->email.'. Click the link to activate');
					});

				return Redirect::route('landing')
					->with('global','Your account has been created! We have sent you an email for verification');
			}
		}
	}

	public function getActivate($code){
		


		return $code;
	}

}
