<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
      'username' => 'brian',
      'email' => 'brian@tykus.ie',
      'password' => Hash::make('8251389')
    ]);
	}

}
