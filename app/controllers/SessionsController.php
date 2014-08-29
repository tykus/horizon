<?php

use Horizon\Utilities\GeoLocate;

class SessionsController extends \BaseController {

	public function __construct(Geolocate $locator)
	{
		$this->locator = $locator;
	}

	public function create()
	{
		if (Auth::check())
		{
			return Redirect::route('dashboard_path');
		}
		else
		{
			return View::make('site.sessions.create');
		}
	}

	public function store()
	{
		$login_success = Auth::attempt(Input::only('email', 'password'));

		$ip_locator = $this->locator->make();
		$login_attempt_details = [
			'email' => Input::get('email'),
			'ip' => Request::getClientIp(),
			'login_success' => $login_success
		];

		AccessLog::create(array_merge($ip_locator, $login_attempt_details));

		if ($login_success) {
			return Redirect::route('dashboard_path');
		}
		else
		{
			return Redirect::back()->withInput()->with('errors', 'Authentication failed, please try again');
		}
	}

	public function destroy()
	{
		Auth::logout();
		Session::flash('info', 'Logged out successfully');
		return Redirect::route('login_path');
	}

}
