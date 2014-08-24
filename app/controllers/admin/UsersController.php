<?php namespace App\Controllers\Admin;

use \Hash;
use \User;
use \Input;
use \View;
use \Auth;
use \Redirect;


class UsersController extends \BaseController {

  public function index()
  {
    $users = User::all();
    return View::make('admin.users.index', compact('users'));
  }

  public function edit()
  {
    $id = Auth::user()->id;
    $user = User::find($id);
    return View::make('admin.users.edit', compact('user'));
  }

  public function update()
  {
    // TODO: validation
    $id = Auth::user()->id;
    $user = User::find($id);
    $user->name = Input::get('name');
    $user->email = Input::get('email');
    if ( ( Input::get('password') != '' ) && ( Input::get('password') == Input::get('password_confirmation') ) )
    {
      $user->password = Hash::make( Input::get('password') );
    }

    if ( $user->save() )
    {
      return Redirect::route('admin.users.index');
    }
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
