<?php
Route::get('/', array('as'=>'landing', 'uses'=>'HomeController@index'));

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@home'));

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
		|	create account (POST)
		*/
		Route::post('/account/create',array('as'=>'account-create-post','uses'=>'AccountController@postCreate'));

		});

	/*
	|	sign in (GET)
	*/
	Route::get('/account/signin',array('as'=>'account-signin','uses'=>'AccountController@getSignIn'));

	/*
	|	sign in (POST)
	*/
	Route::post('/account/signin',array('as'=>'account-signin-post','uses'=>'AccountController@postSignIn'));


	/*
	|	create account (GET)
	*/
	Route::get('/account/create',array('as'=>'account-create','uses'=>'AccountController@getCreate'));

	/*
	|	activate account (GET)
	*/
	Route::get('/account/activate/{code}',array('as'=>'account-activate','uses'=>'AccountController@getActivate'));


});