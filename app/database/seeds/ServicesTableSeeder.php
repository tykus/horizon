<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

    Service::create([
      'title' => 'Counselling & Psychotherapy',
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/depression.jpg',
      'sort_order' => 1
    ]);

    Service::create([
      'title' => 'Dual Diagnosis',
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/addiction.jpg',
      'sort_order' => 2
    ]);

		Service::create([
      'title' => 'Young Adults',
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/anxiety.jpg',
      'sort_order' => 3
		]);

	}

}
