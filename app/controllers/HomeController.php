<?php

class HomeController extends BaseController {

	public function index()
	{
		$services = Service::all();

		return View::make('home', compact('services'));
	}

}
