<?php namespace App\Controllers\Admin;

use View;
use Input;
use Redirect;
use Service;

class ServicesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /services
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = Service::sorted();
		return View::make('admin.services.index', compact('services'));
	}

	/**
	 * Display the specified resource.
	 * GET /services/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = Service::find($id);
		return View::make('admin.services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /services/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = Service::find($id);
		return View::make('admin.services.edit', compact('service'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /services/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$service = Service::find($id);
		if ($service->update(Input::get()))
			return Redirect::action('admin.services.index');
	}

}
