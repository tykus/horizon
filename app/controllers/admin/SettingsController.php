<?php namespace App\Controllers\Admin;

use Setting;
use Input;
use Response;
use View;

class SettingsController extends \BaseController {

	public function edit($key)
	{
		$setting = Setting::where('key', $key)->first();
		return View::make('admin.settings.edit', compact('setting'));
	}

	public function update($id)
	{
		$setting = Setting::find($id);
		if ($setting->update(Input::get()))
			return Response::json(null, 204);
	}

}

// TODO: make a new field to specify whether the setting should appear on the dropdown
// e.g 'about' should have it's own section