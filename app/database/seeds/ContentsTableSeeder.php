<?php

class ContentsTableSeeder extends Seeder {

	public function run()
	{
		$aboutContent = "<p><strong>Robert Gill — Dip. Psych., M.I.A.C.P.</strong> is an integrative 
			psychotherapist/counsellor based in Dublin city centre.</p>
			<p>Degree in Integrative Psychotherapy and Counselling. Accredited with the 
			Irish Association of Humanistic and Integrative Psychotherapy (IAHIP) and the Irish 
			Association for Counselling and Psychotherapy (IACP). Accredited supervisor with IAHIP.</p>
			<p>Specialist experience in anxiety, depression, relationships, body-based 
			psychological problems or 'psychosomatic' problems, trauma, bereavement, eating disorders, 
			addictions, anger management, men’s issues, self esteem, among others.</p>
		";
		$locationContent = "53.3372335,-6.2501318";
		$nameContent = 'Horizon Centre';
		$addressContent = nl2br("Denshaw House,\n121 Baggot Street Lower,\nDublin 2");
		$emailContent = 'robert@horizoncentre.ie';
		$phoneContent = '087-654-3210';
		$mobileContent = '087-654-3210';
		$sloganContent = 'Inspiring positive change;';

			Content::create([
				'key' => 'about',
				'value' => $aboutContent
			]);
			Content::create([
				'key' => 'location',
				'value' => $locationContent
			]);
			Content::create([
				'key' => 'name',
				'value' => $nameContent
			]);
			Content::create([
				'key' => 'address',
				'value' => $addressContent
			]);
			Content::create([
				'key' => 'email',
				'value' => $emailContent
			]);
			Content::create([
				'key' => 'phone',
				'value' => $phoneContent
			]);
			Content::create([
				'key' => 'mobile',
				'value' => $mobileContent
			]);
			Content::create([
				'key' => 'slogan',
				'value' => $sloganContent
			]);
	}

}