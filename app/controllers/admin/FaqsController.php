<?php namespace App\Controllers\Admin;

use \Faq;
use \View;
use \Input;
use \Response;
use \Redirect;

class FaqsController extends \BaseController {

	public function index()
	{
		$faqs = Faq::sorted()->paginate(10);
		return View::make('admin.faqs.index', compact('faqs'));
	}

	public function show($id)
	{
		$faq = Faq::findOrFail($id);
		return View::make('admin.faqs.show', compact('faq'));
	}

	public function edit($id)
	{
		$faq = Faq::find($id);
		return View::make('admin.faqs.edit', compact('faq'));
	}

	public function update($id)
	{
		$faq = FAQ::find($id);
		$faq->update(Input::get());
		return Redirect::route('admin.faqs.index');
	}

	public function create()
	{
		$faq = new Faq;
		return View::make('admin.faqs.create', compact('faq'));
	}

	public function store()
	{
		$faq = Faq::create(Input::get());
		return Redirect::route('admin.faqs.index');
	}

	public function destroy($id)
	{
		Faq::find($id)->delete();
		return Response::json(null, 204);
	}

	public function sort()
	{
		$ordering = Input::get('faq');

		foreach($ordering as $position => $id)
		{
			$faq = Faq::find($id);
			$faq->sort_order = $position;
			$faq->save();
		}
		return Response::json(['message'=>'ok', 200]);
	}

}
