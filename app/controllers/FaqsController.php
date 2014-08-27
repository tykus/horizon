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
		$faqs = Faq::sorted()->get();

		return View::make('site.faqs.index', compact('faqs'));
	}

}
