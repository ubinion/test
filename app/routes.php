<?php
Route::get('/', array('as'=>'landing', 'uses'=>'HomeController@index'));

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@home'));

Route::get('logout',array('as'=>'logout', 'uses'=>'HomeController@logout'));

Route::get('login/fb',array('as'=>'fb_login', 'uses'=>'LoginFacebookController@login'));

Route::get('login/fb/callback',array('as'=>'fb_callback', 'uses'=>'LoginFacebookController@callback'));