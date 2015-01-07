<?php
class AccountController extends BaseController {

	public function getCreate(){
		return View::make('account.create');
	}
	

	public function postCreate(){

		$validator = Validator::make(Input::all(),
			array(
				'email'=>'required | max:50 | email | unique:users',
				'uid_fb'=>'required | max:20 | min:3 | unique:users',
				'password'=>'required | min:6',
				'password2'=>'required | same:password'
			));

		if ($validator->fails()){

			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		}
		else{
			return 'success';
		}

	}

}
