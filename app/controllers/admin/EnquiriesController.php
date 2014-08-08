<?php namespace App\Controllers\Admin;

use App\Models\Enquiry as Enquiry;
use \View as View;

class EnquiriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /enquiries
	 *
	 * @return Response
	 */
	public function index()
	{
		$enquiries = Enquiry::all();
		return View::make('admin.enquiries.index', compact('enquiries'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /enquiries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /enquiries
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /enquiries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /enquiries/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /enquiries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /enquiries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
