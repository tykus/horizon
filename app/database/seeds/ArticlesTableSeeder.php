<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
      $title = $faker->sentence(5);
			Article::create([
        'title' => $title,
        'slug' => Str::slug($title),
        'content' => $faker->paragraph(20),
        'published_date' => $faker->dateTimeThisMonth($max = 'now')
			]);
		}
	}

}
