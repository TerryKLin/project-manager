<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
	        "first_name" => "Manager",
	        "last_name" => "Project",
	        "email" => "pm@project.manager",
	        "password" => Hash::make('password'),
	        "role" => "project manager",
	        "remember_token" => null
        ));

        User::create(array(
	        "first_name" => "Developer",
	        "last_name" => "Project",
	        "email" => "developer@project.manager",
	        "password" => Hash::make('password'),
	        "role" => "developer",
	        "remember_token" => null
        ));

        User::create(array(
	        "first_name" => "Client",
	        "last_name" => "Project",
	        "email" => "client@project.manager",
	        "password" => Hash::make('password'),
	        "role" => "client",
	        "remember_token" => null
        ));
		

        $this->command->info('User table seeded!');
    }

}