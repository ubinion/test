<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('confessions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('content',500);
			$table->string('sender');
			$table->boolean('anonymous');
			$table->integer('up_vote');
			$table->integer('down_vote');

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
		Schema::drop('confessions');
	}

}
