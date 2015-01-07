<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$data=array();

	if(Auth::check()){
		$data=Auth::user();
	}

	return View::make('index')->with('data',$data);
});

Route::get('login/fb','LoginFacebookController@login');
Route::get('login/fb/callback','LoginFacebookController@callback');
Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('/');
});