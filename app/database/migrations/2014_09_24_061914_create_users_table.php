<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('email', 255);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('address1', 255)->nullable();
            $table->string('address2', 255)->nullable();
            $table->integer('apt_suite')->nullable();
            $table->string('city', 127)->nullable();
            $table->string('state', 127)->nullable();
            $table->string('country', 127)->nullable();
            $table->string('zip')->nullable();
            $table->boolean('admin')->default(0);
            $table->boolean('active')->default(1);
			$table->timestamps();
            $table->rememberToken();
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
