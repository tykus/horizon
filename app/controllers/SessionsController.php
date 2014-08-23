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
			return View::make('sessions.create');
		}
	}

	public function store()
	{
		if (Auth::attempt(Input::only('email', 'password'))) {
			return Redirect::route('dashboard_path');
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	public function destroy()
	{
		Auth::logout();
		return Redirect::route('login_path');
	}

}
