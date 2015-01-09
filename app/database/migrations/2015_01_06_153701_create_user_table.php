<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('first_name',200);
			$table->string('last_name',200);
			$table->string('password');
			$table->string('password_temp');
			$table->bigInteger('uid_fb');
			$table->string('birthday');
			$table->string('photo_url');
			$table->string('fb_token');
			$table->boolean('active');
			$table->string('activate_code',60);
			$table->string('remember_token');
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
