<?php namespace App\Controllers\Admin;

use \Content;
use \Input;
use \Response;
use \View;

class ContentsController extends \BaseController {

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin.contentscontroller/{id}/edit
	 *
	 * @param  int  $page
	 * @return Response
	 */
	public function edit($page)
	{
		$content = Content::where('page', $page)->firstOrFail();
		return View::make('admin.contents.edit', compact('content'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin.contentscontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$content = Content::find($id);
		$content->update(Input::get());
		return Response::json(null, 204);
	}

}
