<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EnquiriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Enquiry::create([
        'name' => $faker->name,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber,
        'message' => $faker->paragraph(2),
        'viewed' => $faker->boolean(75)
			]);
		}
	}

}
