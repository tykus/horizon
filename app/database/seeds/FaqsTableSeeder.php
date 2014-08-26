<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FaqsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Faq::create([
				'question' => $faker->sentence(10),
				'answer' => $faker->paragraph(5),
				'sort_order' => $index
			]);
		}
	}

}