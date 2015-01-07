<?php
Route::get('/', array('as'=>'landing', 'uses'=>'HomeController@index'));

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@home'));

Route::get('logout',array('as'=>'logout', 'uses'=>'HomeController@logout'));

Route::get('login/fb',array('as'=>'fb_login', 'uses'=>'LoginFacebookController@login'));

Route::get('login/fb/callback',array('as'=>'fb_callback', 'uses'=>'LoginFacebookController@callback'));

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
	|	create account (GET)
	*/
	Route::get('/account/create',array('as'=>'account-create','uses'=>'AccountController@getCreate'));

});