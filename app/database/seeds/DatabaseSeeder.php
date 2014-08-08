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

		Eloquent::unguard();

		$this->call('EnquiriesTableSeeder');
	}

}
