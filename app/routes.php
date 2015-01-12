<?php
Route::get('/', array('as'=>'landing', 'uses'=>'HomeController@index'));

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@index'));

Route::get('login/fb',array('as'=>'fb_login', 'uses'=>'LoginFacebookController@login'));

Route::get('login/fb/callback',array('as'=>'fb_callback', 'uses'=>'LoginFacebookController@callback'));

/*
|	Authenticated group
*/
Route::group(array('before'=>'auth'),function(){

	/*
	|	CSRF protection group
	*/
	Route::group(array('before'=>'csrf'),function(){

		/*
	|	Change password (POST)
	*/
	Route::post('/account/change-password',array('as'=>'account-chg-pw-post', 'uses'=>'AccountController@postChgPw'));

	});
	/*
	|	Change password (GET)
	*/
	Route::get('/account/change-password',array('as'=>'account-chg-pw', 'uses'=>'AccountController@getChgPw'));

	/*
	|	Sign Out(GET)
	*/
	Route::get('/account/signout',array('as'=>'account-signout', 'uses'=>'AccountController@getSignOut'));

	/*
	|	Edit profile(GET)
	*/
	Route::get('user/{username}',array(
		'as' 	=> 'profile-user',
		'uses'	=> 'ProfileController@user'
	));	

});


/*
|	Unauthenticated group
*/
Route::group(array('before'=>'guest'),function(){

	/*
	|	CSRF protection group
	*/
	Route::group(array('before'=>'csrf'),function(){

		/*
		|	signup account (POST)
		*/
		Route::post('/account/signup',array('as'=>'account-signup-post','uses'=>'AccountController@postSignUp'));

	});


	/*
	|	signup account (GET)
	*/
	Route::get('/account/signup',array('as'=>'account-signup','uses'=>'AccountController@getSignUp'));

	/*
	|	log in (GET)
	*/
	Route::get('/account/login',array('as'=>'account-login','uses'=>'AccountController@getLogIn'));

	/*
	|	log in (POST)
	*/	
	Route::post('/account/login',array('as'=>'account-login-post','uses'=>'AccountController@postLogIn'));

	/*
	|	forgot password (GET)
	*/
	Route::get('/account/forgot-password',array('as'=>'account-forgot-pw','uses'=>'AccountController@getForgotPw'));

	/*
	|	forgot password (POST)
	*/
	Route::post('/account/forgot-password',array('as'=>'account-forgot-pw-post','uses'=>'AccountController@postForgotPw'));

	/*
	|	recover password (GET)
	*/
	Route::get('/account/recover/{code}', array('as'=>'account-recover', 'uses'=>'AccountController@getRecover'));

	/*
	|	activate account (GET)
	*/
	Route::get('/account/activate/{code}',array('as'=>'account-activate','uses'=>'AccountController@getActivate'));


});