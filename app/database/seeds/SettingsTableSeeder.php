<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		$about = "<p><strong>Robert Gill — Dip. Psych., M.I.A.C.P.</strong> is an integrative
			psychotherapist/counsellor based in Dublin city centre.</p>
			<p>Degree in Integrative Psychotherapy and Counselling. Accredited with the
			Irish Association of Humanistic and Integrative Psychotherapy (IAHIP) and the Irish
			Association for Counselling and Psychotherapy (IACP). Accredited supervisor with IAHIP.</p>
			<p>Specialist experience in anxiety, depression, relationships, body-based
			psychological problems or 'psychosomatic' problems, trauma, bereavement, eating disorders,
			addictions, anger management, men’s issues, self esteem, among others.</p>
		";
		$location = "53.3372335,-6.2501318";
		$name = 'Horizon Centre';
		$address = nl2br("Denshaw House,\n121 Baggot Street Lower,\nDublin 2");
		$email = 'robert@horizoncentre.ie';
		$phone = '087-654-3210';
		$mobile = '087-654-3210';
		$slogan = 'Inspiring positive change';

			Setting::create([
				'key' => 'about',
				'value' => $about,
				'field' =>'textarea',
				'on_menu' => 0
			]);
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
	}

}
