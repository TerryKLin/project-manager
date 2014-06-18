<?php

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		DB::table('projects')->delete();

		$client = User::firstOrCreate(array(
			"role" => "client"
		));

		Project::create(array(
			"name" => "Project Manager",
	        "description" => "Full Project Management System",
	        "user_id" => $client->id
		));
	}

}