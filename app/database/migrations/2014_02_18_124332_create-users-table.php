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
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 25);
			$table->string('firstname', 20);
			$table->string('lastname', 20);
			$table->string('email', 100)->unique();
			$table->string('password', 64);
			$table->string('description', 400);
			$table->timestamps();
		});

		User::create(
			array(
				'username'		=> 'henkie',
				'firstname'		=> 'henk',
				'lastname'		=> 'janwillem',
				'email'			=> 'henk@henk.nl',
				'password'		=> 'henkie',
		));
		$user->makeEmployee('super_admin');
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
