<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

    $title = 'Counselling & Psychotherapy';
    Service::create([
      'title' => $title,
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/depression.jpg',
      'sort_order' => 1,
      'slug' => Str::slug($title)
    ]);

    $title = 'Dual Diagnosis';
    Service::create([
      'title' => $title,
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/addiction.jpg',
      'sort_order' => 2,
      'slug' => Str::slug($title)
    ]);

    $title = 'Young Adults';
		Service::create([
      'title' => $title,
      'description' => $faker->paragraph(20),
      'introduction' => $faker->paragraph(5),
      'image_path' => '/img/anxiety.jpg',
      'sort_order' => 3,
      'slug' => Str::slug($title)
		]);

	}

}
