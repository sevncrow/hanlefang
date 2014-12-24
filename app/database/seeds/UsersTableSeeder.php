<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
			User::create([
				'id' => 1,
				'username' => 'admin',
				'password' => Hash::make('admin1234')
			]);
	}

}