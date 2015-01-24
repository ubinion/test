<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array(
								'email',
								'password',
								'first_name',
								'last_name',
								'password_temp',
								'active',
								'activate_code',
								'fb_login',
								'fb_uid',
								'gender',
								'birthday',
								'uni_name',
								'uni_course',
								'city_current',
								'city_hometown',
								'work_company',
								'work_pos',
								'photo_url',
								'fb_token');
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
