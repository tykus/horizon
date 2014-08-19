<?php namespace App\Controllers\Admin;

use Setting;
use Input;
use Response;
use View;
use Horizon\Repositories\SettingsRepositoryInterface;

class SettingsController extends \BaseController {

	protected $setting;

	public function __construct(SettingsRepositoryInterface $setting)
	{
		$this->setting = $setting;
	}

	public function edit($key)
	{
		$setting = $this->setting->findByKey($key);
		return View::make('admin.settings.edit', compact('setting'));
	}

	public function update($id)
	{
		$this->setting->update($id, Input::get());

		return Response::json(null, 204); // TODO: allow from non-AJAX request
	}

}