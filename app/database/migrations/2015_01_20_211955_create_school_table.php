<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools',function($table){
			$table->string('id',6)->primary();
			$table->string('name',200);
			$table->string('college_id',6);
			$table->foreign('college_id')->references('id')
										->on('colleges')
										->onDelete('cascade')
										->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schools');
	}

}
