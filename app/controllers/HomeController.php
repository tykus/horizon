<?php


class HomeController extends BaseController {

	public function index()
	{
		// TODO create a Repository / ServiceProvider to get all of this data
		$about = Setting::where('key','about')->first();
		$services = Service::all();
		return View::make('home', compact('services', 'about'));
	}

}
