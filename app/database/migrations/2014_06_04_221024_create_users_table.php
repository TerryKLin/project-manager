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
	        // First name of the user
	        $table->string('first_name');
	        // Last name of the user
	        $table->string('last_name');
	        // Email of the user, used for authentication
	        $table->string('email')->unique();
	        // Bcrypt hash of the password
	        $table->string('password');
	        // role in the system
	        $table->string('role');
	        // Auth session information
	        $table->string('remember_token')->nullable();
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
