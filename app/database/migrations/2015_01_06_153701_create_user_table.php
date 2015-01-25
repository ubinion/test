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
			$table->boolean('active')->nullable();
			$table->string('activate_code',60)->nullable();
			$table->string('remember_token')->nullable();
			$table->boolean('fb_login')->default(false);

			$table->bigInteger('fb_uid')->nullable();
			$table->string('gender')->nullable();
			$table->string('birthday')->nullable();

			$table->string('uni_name')->nullable();
			$table->string('uni_course')->nullable();
			$table->string('city_current')->nullable();
			$table->string('city_hometown')->nullable();
			$table->string('work_company')->nullable();
			$table->string('work_pos')->nullable();

			$table->string('photo_url')->nullable();
			$table->string('fb_token')->nullable();
			
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
