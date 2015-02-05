<?php
Route::get('/', array('as'=>'landing', 'uses'=>'HomeController@index'));

Route::get('login/fb',array('as'=>'fb_login', 'uses'=>'LoginFacebookController@login'));

Route::get('login/fb/callback',array('as'=>'fb_callback', 'uses'=>'LoginFacebookController@callback'));

Route::get('/about/about',array('as'=>'about-page', 'uses'=>'AboutPageController@getAboutPage'));

Route::get('/privacy_terms/privacy',array('as'=>'privacy-page', 'uses'=>'PrivacyTermsController@getPrivacyPage'));

Route::get('/privacy_terms/terms',array('as'=>'terms-page', 'uses'=>'PrivacyTermsController@getTermsPage'));
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


		/*
	|	Edit Profile (POST)
		*/
		Route::post('/user/{id}',array('as'=>'profile-edit-post', 'uses'=>'ProfileController@postEditProfile'));

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
	Route::get('user/{id}',array(
		'as' 	=> 'profile-edit',
		'uses'	=> 'ProfileController@getEditProfile'
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

		/*
		|	facebook signup account (POST)
		*/
		Route::post('/account/fb-signup',array('as'=>'account-fb-signup-post','uses'=>'AccountController@postFbSignUp'));

	});

	/*
	|	facebook signup account (GET)
	*/
	Route::get('/account/fb-signup',array('as'=>'account-fb-signup','uses'=>'AccountController@getFbSignUp'));


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