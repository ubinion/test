<?php
class AccountController extends BaseController {

	
	/*
	|	Login Page (get)
	*/
	public function getLogIn(){

		return View::make('account.login');
	}

	/*
	|	Login Page (post)
	*/
	public function postLogIn(){

		//if remeber me is checked
		$remember = (Input::has('remember')) ? true : false; 

		//auth user to login
		$auth =	Auth::attempt(array(
			'email'		=>	Str::lower(Input::get('email')),
			'password'	=>	Input::get('password'),
			'active' 	=>	1
		), $remember);

		if($auth){
			//redirect to home page
			return Redirect::intended('/')
				->with('global','<p class="text-success">Logged In</p>');
		}else{
			//redirect to login page with error message
			return Redirect::route('account-login')->with('global','<div class="alert alert-danger" role="alert">
																	  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
																	  	<span class="sr-only">Error:</span>
																	  	Email/password incorrect or account not activated
																	</div>');
		}
		
		//falleback in case the user not redirected 
		return Redirect::route('account-login')->with('global','<div class="alert alert-danger" role="alert">
																  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
																  	<span class="sr-only">Error:</span>
																  	Failed to login at the moment :( Have you activated your account?
																</div>');
	}

	/*
	|	Signout (get)
	*/
	public function getSignOut(){
		//logout
		Auth::logout();

		//redirect back to landing page
		return Redirect::route('landing');
	}

	/*
	|	Forgot password page (get)
	*/
	public function getForgotPw(){
		//create forgot password view
		return View::make('account.forgot_password');
	}

	/*
	|	Forgot password page (post)
	*/
	public function postForgotPw(){
		//find user where email = input email
		$user = User::where('email','=',Str::lower(Input::get('email')));

		//if user found
		if($user->count()){

			//if match found
			$user 					= $user->first();

			//generate new activate code and new password
			$code 					= str_random(60);
			$password 				= str_random(10);

			//update value in db
			$user->activate_code	= $code;
			$user->password_temp	= Hash::make($password);

			//save to db
			if($user->save()){

				//send email to user with new password and activate link
				Mail::send('emails.auth.forgot_mail',array('link' => URL::route('account-recover', $code), 'name' => $user->last_name, 'password'=>$password), function($message) use ($user){
					$message->to($user->email, $user->last_name)->subject("It's ok, it happens. Here is yours...");
				});				
				
				//return to forgot-pw page
				return Redirect::route('account-forgot-pw')
						->with('global','<div class="alert alert-success" role="alert">
											<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
											New password has been sent. Please check your mail.
										</div>');
			}

		}else{

			//return error msg wrong old password
			return Redirect::route('account-forgot-pw')
					->with('global','<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>
										Incorrect Email Address. Please try again.
									</div>');
		}
	}

	/*
	|	Recover password (get from email link)
	*/
	public function getRecover($code){
		//find user where activate code is match and password_temp ! empty
		$user = User::where('activate_code','=',$code)->where('password_temp','!=','');

		if ($user->count()){
			//get user data
			$user 					= $user->first();

			//update values
			$user->password 		= $user->password_temp;
			$user->password_temp	= '';
			$user->activate_code	= '';

			//save to db
			if($user->save()){

				//return with success msg after saved to db
				return Redirect::route('account-login')
						->with('global','<div class="alert alert-success" role="alert">
											<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
											Your can now login with a new password provided in email.
										</div>');
			}
		}

		return 'Error in get Recover';
	}

	/*
	|	Change password (get)
	*/
	public function getChgPw(){

		//initialize user array
		$user=array();

		//if auth user, get data
		if(Auth::check()){
			$user=Auth::user();
		}

		//make change pw view with user data
		return View::make('account.chg-password')->with('user',$user);
	}

	/*
	|	Change password (post)
	*/
	public function postChgPw(){

		//set validator, password 2 must same with password 1
		$validator = Validator::make(Input::all(),
			array(
				'new_password_2' =>'same:new_password'

			)
		);

		//if violate validator
		if ($validator->fails()){

			//return to chg pw view with old input and error
			return Redirect::route('account-chg-pw')
					->withErrors($validator)
					->withInput();
		}else{

			//get the user data where id is current user id
			$user = User::find(Auth::user()->id);

			//get values from input
			$old_password = Input::get('old_password');
			$new_password = Input::get('new_password');

			//if old password and the password in db is match
			if(Hash::check($old_password, $user->getAuthPassword())){

				//if password provided matched
				$user->password=Hash::make($new_password);

				if ($user->save()){

					//return with success msg after saved to db
					return Redirect::route('account-chg-pw')
							->with('global','<div class="alert alert-info" role="alert">
												<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 
												Your password has been changed	
											</div>');
				}

			}else{

				//return error msg wrong old password
					return Redirect::route('account-chg-pw')
							->with('global','<div class="alert alert-danger" role="alert">
											  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											  	<span class="sr-only">Error:</span>
											  	Your old password is wrong. Try again
											</div>');
			}
			
		}
		//fallback for change password
		return Redirect::route('account-chg-pw')->with('global','<div class="alert alert-danger" role="alert">
																  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
																  	<span class="sr-only">Error:</span>
																  	We could not change your password. Try again
																</div>');

	}

	/*
	|	Sign Up Page (get)
	*/
	public function getSignUp(){
		//make the sign up view
		return View::make('account.signup');
	}
	
	/*
	|	Sign Up Page (post)
	*/
	public function postSignUp(){

		//set the validator
		$validator = Validator::make(Input::all(),
			array(
				'email'				=>'unique:users',
				'confirm_password'	=>'same:password'
			)
		);

		//if violate the validator
		if ($validator->fails()){
			//
			return Redirect::route('account-signup')
					->withErrors($validator)
					->withInput();
		}
		else{
			//get data from input
			$email				=	Str::lower(Input::get('email'));
			$uid_fb				=	Input::get('uid_fb');
			$first_name			=	Input::get('first_name');
			$last_name			=	Input::get('last_name');
			$password	=	Input::get('password');

			//generate activation code
			$code		=	str_random(60);

			//insert new user to db
			$user 	=	User::create(array(
				'email'			=>	$email,
				'uid_fb'		=>	$uid_fb,
				'first_name'	=>	$first_name,
				'last_name'		=>	$last_name,
				'password'		=>	Hash::make($password),
				'activate_code'	=>	$code,
				'active'		=>	0

			));

			//if user inserted
			if($user){

				//send activation mail to the email
				Mail::send('emails.auth.activate_mail', array('link'=> URL::route('account-activate',$code), 'name'=>$last_name),function($message) use ($user){
						$message->to($user->email, $user->last_name)->subject('Welcome to Ubinion!');
				});

				//back to sign up view with success msg
				return Redirect::route('account-signup')
					->with('success_signup_msg','<div class="alert alert-success" role="alert">
													<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
													Verification email has been sent to <strong>'.$user->email.'</strong> <br/>Please check your inbox.
												</div>');
			}
		}
	}

	/*
	|	Activate account (get from email)
	*/
	public function getActivate($code){
		
		//find the user where activate_code is same and active is false
		$user =	User::where('activate_code','=',$code);

		//If user found
		if($user->count()){
			
			//get user data
			$user=$user->first();
			
			//update user active state
			$user->active			=	1;
			$user->activate_code	=	'';

			//save to db
			if($user->save()){
				//redirect to login page with success msg
				return Redirect::route('account-login')->with('account-active-msg','<div class="alert alert-info" role="alert">
																						<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
																						Account has been activated. <br/>You can login now.	
																					</div>');
			}
		}

		//redirect to login page with alternative success msg
		return Redirect::route('account-login')->with('account-active-msg','<div class="alert alert-info" role="alert">
																				<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
																				Your account already activated. <br/>You can login now.		
																			</div>');
	}

}
