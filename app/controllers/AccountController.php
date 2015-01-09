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

			//auth user to signin

			$auth =	Auth::attempt(array(
					'email'		=>	Input::get('email'),
					'password'	=>	Input::get('password'),
					'active' 	=>	1
			));

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
