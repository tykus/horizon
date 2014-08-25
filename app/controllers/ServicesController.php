<?php

class ServicesController extends \BaseController {

	/**
	 * Display the specified resource.
	 * GET /services/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$service = Service::where('slug', $slug)->get();
		if ($service)
		{
			return View::make('services.show', compact('service'));
		}
	}


}