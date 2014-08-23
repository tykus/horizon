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
			return Auth::user()->username;
		}
		else
		{
			return "failed";
		}
	}

	public function destroy()
	{
		Auth::logout();
		return Redirect::route('login_path');
	}

}
