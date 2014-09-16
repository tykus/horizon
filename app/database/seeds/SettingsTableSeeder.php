<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		$location = "53.3372335,-6.2501318";
		$name = 'Horizon Centre';
		$address = nl2br("Denshaw House,\n121 Baggot Street Lower,\nDublin 2");
		$email = 'robert@horizoncentre.ie';
		$phone = '087-654-3210';
		$mobile = '087-654-3210';
		$slogan = 'Inspiring positive change';
		$facebook = 'http"//www.facebook.com/horizoncentre';
		$twitter = '';
		$linkedin = '';

			Setting::create([
				'key' => 'location',
				'value' => $location,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'name',
				'value' => $name,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'address',
				'value' => $address,
				'field' =>'textarea',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'email',
				'value' => $email,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'phone',
				'value' => $phone,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'mobile',
				'value' => $mobile,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'slogan',
				'value' => $slogan,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'facebook',
				'value' => $facebook,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'twitter',
				'value' => $twitter,
				'field' =>'text',
				'on_menu' => 1
			]);
			Setting::create([
				'key' => 'linkedin',
				'value' => $linkedin,
				'field' =>'text',
				'on_menu' => 1
			]);
	}

}
