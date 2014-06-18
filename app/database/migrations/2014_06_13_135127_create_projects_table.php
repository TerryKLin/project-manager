<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table)
	    {
	        $table->increments('id');
	        // Project Name
	        $table->string('name')->unique();
	        // Project Description
	        $table->text('description')->nullable();
	        // The user ID to which the project belongs
	        $table->integer('user_id');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
