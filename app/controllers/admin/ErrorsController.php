<?php namespace App\Controllers\Admin;

use \View;
use \Error;

class ErrorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /errors
	 *
	 * @return Response
	 */
	public function index()
	{
		$errors = Error::latest()->paginate(10);
		return View::make('admin.errors.index', compact('errors'));
	}

	/**
	 * Display the specified resource.
	 * GET /errors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('admin.errors.show')->with('error', Error::find($id));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /errors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Error::find($id)->delete();
	}

}
