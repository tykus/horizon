<?php namespace App\Controllers\Admin;

use \User;
use \Input;
use \View;
use \Redirect;

class UsersController extends \BaseController {

  public function index()
  {
    $users = User::all();
    return View::make('admin.users.index', compact('users'));
  }

  public function edit($id)
  {
    // Make this accessible only to the current Auth::user()
    $user = User::find($id);
    return View::make('admin.users.edit', compact('user'));
  }

  public function update($id)
  {
    $user = User::find($id);
    # Update the user
    return Redirect::route('admin.users.index');
  }

  public function create()
  {
    $user = new User;
    return View::make('admin.users.create', compact('user'));
  }

  public function store()
  {
    $user = User::create(
      Input::only('email', 'name', 'password')
    );
    return Redirect::route('admin.users.index');
  }

}
