<?php

class ServicesController extends \BaseController {

	public function show($slug)
	{
		$service = Service::where('slug', $slug)->first();
		if ($service)
		{
			return View::make('site.services.show', compact('service'));
		}
		else
		{
			App::abort(404);
		}
	}
}