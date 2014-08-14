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
		$slogan = 'Inspiring positive change;';

			Setting::create([
				'key' => 'about',
				'value' => $about
			]);
			Setting::create([
				'key' => 'location',
				'value' => $location
			]);
			Setting::create([
				'key' => 'name',
				'value' => $name
			]);
			Setting::create([
				'key' => 'address',
				'value' => $address
			]);
			Setting::create([
				'key' => 'email',
				'value' => $email
			]);
			Setting::create([
				'key' => 'phone',
				'value' => $phone
			]);
			Setting::create([
				'key' => 'mobile',
				'value' => $mobile
			]);
			Setting::create([
				'key' => 'slogan',
				'value' => $slogan
			]);
	}

}