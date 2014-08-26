<?php

class FaqsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /faqs
	 *
	 * @return Response
	 */
	public function index()
	{
		$faqs = Faq::all();

		return View::make('faqs.index', compact('faqs'));
	}

}