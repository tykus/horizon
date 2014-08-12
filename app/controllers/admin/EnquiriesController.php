<?php namespace App\Controllers\Admin;

use \Enquiry;
use \Input;
use \View;
use \Mail;
use \Response;

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
	 * Display the specified resource.
	 * GET /enquiries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$enquiry = Enquiry::find($id);
		return View::make('admin.enquiries.show', compact('enquiry'));
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
		$enquiry = Enquiry::find($id);
		$enquiry->viewed = json_decode(Input::get('viewed'));
		return Response::json(null, 204);
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


	public function reply()
	{
		$data = [];

		Mail::pretend('emails.reply', $data, function($message)
		{
			$message->to(e(Input::get('email')))
							->subject(e(Input::get('subject')));
		});
	}

}
