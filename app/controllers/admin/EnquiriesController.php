<?php namespace App\Controllers\Admin;

use Enquiry;
use Input;
use View;
use Mail;
use Response;

use Horizon\Guest;
use Horizon\Mailers\GuestMailer;

class EnquiriesController extends \BaseController {

	protected $mailer;

	public function __construct(GuestMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /enquiries
	 *
	 * @return Response
	 */
	public function index()
	{
		$enquiries = Enquiry::sorted()->get();
		return View::make('admin.enquiries.index', compact('enquiries'));
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
		$enquiry->update([
			'viewed' => true
		]);
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

		$success = $enquiry->save();
		return Response::json(["status"=>$success], 200);
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
		if (Enquiry::find($id)->delete())
			return Response::json(null, 204);
		else
			return Response::json(null, 404);
	}


	public function reply()
	{
		$enquiry = Enquiry::find(Input::get('id'));
		$guest = new Guest($enquiry->name, $enquiry->email);
		$data = array(
			'body' => Input::get('message'),
			'subject' => Input::get('subject')
		);

		$this->mailer->reply($guest, $data);

		return Response::json(null, 204);

	}

}
