<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecturers',function($table){
			$table->string('id',6)->primary();
			$table->string('name',300);
			$table->string('email',200);
			$table->string('college_id',6);
			$table->foreign('college_id')->references('id')
										->on('colleges')
										->onDelete('cascade')
										->onUpdate('cascade');
			$table->string('sch_id',6);
			$table->foreign('sch_id')->references('id')
									->on('schools')
									->onDelete('cascade')
									->onUpdate('cascade');
			$table->string('room');
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
		Schema::drop('lecturers');
	}

}
