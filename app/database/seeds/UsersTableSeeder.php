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
	}

}
