<?php
class ProfileController extends BaseController {

	public function getEditProfile($id){
		
		$user = User::where('id', '=', $id);

		if($user->count()){

			$user = $user->first();

			return View::make('profile.user')
					->with('user',$user);
		}


			return App::abort(404);
	}

	public function postEditProfile($id){
		
		//set the message for each Validator
		/*$message=array('old_password.required'=>'The old password field cannot be empty', 
						'new_password.required'=>'The new password field cannot be empty',
						'new_password.between'=>'The password length is between 6-20 characters',
						'new_password.alpha_num'=>'The password can only use number(0-9) and characters(A-Z, a-z)',
						'new_password_2.same'=>'The new password field not same'
						);

		//set validator, password 2 must same with password 1
		$validator = Validator::make(Input::all(),
			array(
				'old_password' =>'required',
				'new_password' =>'required|between:6,20|alpha_num',
				'new_password_2' =>'same:new_password'
			),$message
		);

		//if violate validator
		if ($validator->fails()){

			//return to chg pw view with old input and error
			return Redirect::route('account-chg-pw')
					->withErrors($validator)
					->withInput();
		}else{*/

			//get the user data where id is current user id
			$user = User::find(Auth::user()->id);

			//get values from input
			$user->first_name 			= Input::get('first_name');
			$user->last_name 			= Input::get('last_name');
			$user->gender 				= Input::get('gender');
			$user->birthday				= Input::get('birthday');
			$user->uni_sem 				= Input::get('uni_sem');
			$user->uni_name 			= Input::get('uni_name');
			$user->uni_course			= Input::get('uni_course');
			$user->city_current			= Input::get('city_current');
			$user->city_hometown		= Input::get('city_hometown');
			$user->work_company			= Input::get('work_company');
			$user->work_pos				= Input::get('work_pos');


			if ($user->save()){

				//return with success msg after saved to db
				return Redirect::route('profile-edit',$user->id)
						->with('global','<div class="alert alert-info" role="alert">
											<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 
											Successfully updated.
										</div>');
			}


			
		//}

		//fallback for change password
		return Redirect::route('profile-edit')->with('global','<div class="alert alert-danger" role="alert">
																  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
																  	<span class="sr-only">Error:</span>
																  	We facing problem to update your profile now. Please Try again later
																</div>');
	}

}