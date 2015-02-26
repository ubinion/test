<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('voter_id')->unsigned();
			$table->foreign('voter_id')->references('id')
									->on('users')
									->onDelete('cascade')
									->onUpdate('cascade');
			$table->integer('voteable_id');
			$table->string('voteable_type');
			$table->integer('voteable_value');

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
		Schema::drop('votes');
	}

}
