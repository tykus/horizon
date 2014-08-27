<?php

class SessionsController extends \BaseController {

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
		if (Auth::attempt(Input::only('email', 'password'))) {
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
