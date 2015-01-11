<?php
class AccountController extends BaseController {

	public function getSignIn(){

		return View::make('account.signin');
	}

	public function postSignIn(){

		$validator = Validator::make(Input::all(),
			array(
				'email'		=>'required | email ',
				'password'	=>'required | min:6',
			)
		);

		if ($validator->fails()){

			//redirect sign in page if fail with error msg
			return Redirect::route('account-signin')
					->withErrors($validator)
					->withInput();
		}
		else{

			$remember = (Input::has('remember')) ? true : false; 

			//auth user to signin
			$auth =	Auth::attempt(array(
					'email'		=>	Input::get('email'),
					'password'	=>	Input::get('password'),
					'active' 	=>	1
			), $remember);

			if($auth){

				return Redirect::intended('/')
					->with('global','Logged In');
			}else{

				return Redirect::route('account-signin')->with('global','Email/password wrong or account not activated');
			}
		}

		return Redirect::route('account-signin')->with('global','Failed to signin at the moment. Have you activated?');
	}

	public function getSignOut(){

		Auth::logout();
		return Redirect::route('landing');
	}

	public function getForgotPw(){

		return View::make('account.forgot_password');
	}

	public function postForgotPw(){

		$user = User::where('email','=',Input::get('email'));

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
				return Redirect::route('landing')
						->with('global','Your password has been changed. Check your mail now');

			}


			//return with success msg after saved to db
			//return Redirect::route('landing')
			//		->with('global','Your password has been changed');
			die('Error in save new password and mail');


		}else{

			//return error msg wrong old password
			return Redirect::route('account-chg-pw')
					->with('global','Your old password is wrong. Try again');
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
				return Redirect::route('landing')
						->with('global','Your can now login with new password provided in email');
			}
		}

		return 'Error in get Recover';
	}

	public function getChgPw(){

		return View::make('account.password');
	}

	public function postChgPw(){

		$validator = Validator::make(Input::all(),
			array(

				'old_password'	=>'required',
				'new_password'	=>'required | min:6',
				'new_password_2'	=>'required | same:new_password'

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
					return Redirect::route('landing')
							->with('global','Your password has been changed');
				}

			}else{

				//return error msg wrong old password
					return Redirect::route('account-chg-pw')
							->with('global','Your old password is wrong. Try again');
			}

		}

		return Redirect::route('account-chg-pw')->with('global','We could not change your password. Try again');

	}

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
			)
		);

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
						$message->to($user->email, $user->last_name)->subject('Activate Ubinion now');
					});

				return Redirect::route('landing')
					->with('global','Verification email has been sent to '.$user->email.'. Please check your inbox');
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
				return Redirect::route('landing')->with('global','Account has been activated.');
			}
		}

		return Redirect::route('landing')->with('global','We could not activate your account. Try again later');
	}

}
