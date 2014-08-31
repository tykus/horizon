<?php

class ContentsTableSeeder extends Seeder {

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

		Content::create([
      'page' => 'about',
      'content' => $about
		]);
	}

}
