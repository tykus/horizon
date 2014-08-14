<?php

class HomeController extends BaseController {

	public function index()
	{
		$services = Service::all();
		$about = Content::where('key', 'about')->first();

		return View::make('home', compact('services', 'about'));
	}

}
