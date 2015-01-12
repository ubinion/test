<?php
class AccountController extends BaseController {

	public function getLogIn(){

		return View::make('account.login');
	}

	public function postLogIn(){

		$remember = (Input::has('remember')) ? true : false; 

		//auth user to login
		$auth =	Auth::attempt(array(
			'email'		=>	Str::lower(Input::get('email')),
			'password'	=>	Input::get('password'),
			'active' 	=>	1
		), $remember);

		if($auth){

			return Redirect::intended('/')
				->with('global','<p class="text-success">Logged In</p>');
		}else{

			return Redirect::route('account-login')->with('global','<p class="text-danger">Email/password wrong or account not activated</p>');
		}
		
		//falleback in case the user not redirected 
		return Redirect::route('account-login')->with('global','<p class="text-danger">Failed to login at the moment. Have you activated?</p>');
	}

	public function getSignOut(){

		Auth::logout();
		return Redirect::route('landing');
	}

	public function getForgotPw(){

		return View::make('account.forgot_password');
	}

	public function postForgotPw(){

		$user = User::where('email','=',Str::lower(Input::get('email')));

		//if user not 0
		if($user->count()){

			//if password provided matched
			$user 					= $user->first();

			//generate new activate code and new password
			$code 					= str_random(60);
			$password 				= str_random(10);

			$user->activate_code	= $code;
			$user->password_temp	= Hash::make($password);

			if($user->save()){

				Mail::send('emails.auth.forgot_mail',array('link' => URL::route('account-recover', $code), 'name' => $user->last_name, 'password'=>$password), function($message) use ($user){
					$message->to($user->email, $user->last_name)->subject('Your new password');
				});				
				
				//return with success msg after saved to db
				return Redirect::route('account-forgot-pw')
						->with('global','<p class="text-success">New password has been sent. Check your mail now</p>');

			}

		}else{

			//return error msg wrong old password
			return Redirect::route('account-forgot-pw')
					->with('global','<p class="text-danger">Wrong email entered. Try again</p>');
		}
	}

	public function getRecover($code){

		$user = User::where('activate_code','=',$code)->where('password_temp','!=','');

		if ($user->count()){

			$user 					= $user->first();
			$user->password 		= $user->password_temp;
			$user->password_temp	= '';
			$user->activate_code	= '';

			if($user->save()){

				//return with success msg after saved to db
				return Redirect::route('account-login')
						->with('global','<p class="text-success">Your can now login with new password provided in email</p>');
			}
		}

		return 'Error in get Recover';
	}

	public function getChgPw(){

		return View::make('account.chg-password');
	}

	public function postChgPw(){

		$validator = Validator::make(Input::all(),
			array(
				'new_password_2' =>'same:new_password'

			)
		);

		if ($validator->fails()){

			return Redirect::route('account-chg-pw')
					->withErrors($validator)
					->withInput();
		}else{

			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$new_password = Input::get('new_password');

			//if old password and the password in db is match
			if(Hash::check($old_password, $user->getAuthPassword())){
				//if password provided matched
				$user->password=Hash::make($new_password);

				if ($user->save()){

					//return with success msg after saved to db
					return Redirect::route('account-chg-pw')
							->with('global','<p class="text-success">Your password has been changed</p>');
				}

			}else{

				//return error msg wrong old password
					return Redirect::route('account-chg-pw')
							->with('global','<p class="text-danger">Your old password is wrong. Try again</p>');
			}

		}

		return Redirect::route('account-chg-pw')->with('global','<p class="text-danger">We could not change your password. Try again</p>');

	}

	public function getSignUp(){
		return View::make('account.signup');
	}
	

	public function postSignUp(){

		$validator = Validator::make(Input::all(),
			array(
				'email'				=>'unique:users',
				'confirm_password'	=>'same:password'
			)
		);

		if ($validator->fails()){

			return Redirect::route('account-signup')
					->withErrors($validator)
					->withInput();
		}
		else{
			$email				=	Str::lower(Input::get('email'));
			$uid_fb				=	Input::get('uid_fb');
			$first_name			=	Input::get('first_name');
			$last_name			=	Input::get('last_name');
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
						$message->to($user->email, $user->last_name)->subject('Activate Ubinion now');
				});

				return Redirect::route('account-signup')
					->with('success_signup_msg','<p class="text-success">Verification email has been sent to '.$user->email.'. Please check your inbox</p>');
			}
		}
	}

	public function getActivate($code){
		
		$user =	User::where('activate_code','=',$code)->where('active','=',0);

		if($user->count()){

			$user=$user->first();
			
			//update user active state
			$user->active			=	1;
			$user->activate_code	=	'';

			if($user->save()){
				return Redirect::route('landing')->with('global','<p class="text-success">Account has been activated.</p>');
			}
		}

		return Redirect::route('landing')->with('global','<p class="text-danger">We could not activate your account. Try again later</p>');
	}

}
