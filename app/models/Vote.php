<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vote extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array(
								'voter_id',
								'voteable_id',
								'voteable_type',
								'voteable_value');
	use UserTrait, RemindableTrait;

	protected $table = 'votes';

	/*public function voteable(){

		return $hits->morphTo();
	}*/
}