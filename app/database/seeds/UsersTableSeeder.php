<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
    User::create([
      'name' => 'Brian',
      'email' => 'brian@tykus.ie',
      'password' => Hash::make('8251389'),
      'role' => 'admin'
    ]);
		User::create([
      'name' => 'Robert',
      'email' => 'robbiegill1@gmail.com',
      'password' => Hash::make('robbie'),
      'role' => 'user'
    ]);
	}

}
