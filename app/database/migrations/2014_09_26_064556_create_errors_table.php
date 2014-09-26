<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('errors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('message');
			$table->integer('time');
            $table->string('file', 255);
            $table->integer('line');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('errors');
	}

}
