<?php namespace App\Controllers\Admin;

use \Faq;
use \View;

class FaqsController extends \BaseController {

	public function index()
	{
		$faqs = Faq::all(); // TODO: order by sort order

		return View::make('admin.faqs.index', compact('faqs'));
	}
	
	public function update($id)
	{

	}

	public function store()
	{

	}

	public function delete($id)
	{

	}

}