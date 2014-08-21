<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Enquiry::truncate();
		Service::truncate();
		Article::truncate();
		Setting::truncate();

		Eloquent::unguard();

		$this->call('EnquiriesTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('SettingsTableSeeder');
	}

}
