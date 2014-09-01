<?php namespace App\Controllers\Admin;

use \Hash;
use \User;
use \Input;
use \View;
use \Auth;
use \Redirect;
use \Response;
use \Session;


class UsersController extends \BaseController {

  public function index()
  {
    $users = User::with('lastLogin')->get();
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
    // TODO: validation & refactor into a UserRepository
    $id = Auth::user()->id;
    $user = User::find($id);
    $user->name = Input::get('name');
    $user->email = Input::get('email');

    if ( Auth::user()->isAdmin() )
    {
      $user->role = Input::get('role');
    }

    if ( ( Input::get('password') != '' ) && ( Input::get('password') == Input::get('password-confirmation') ) )
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
    if ( Auth::user()->isAdmin() )
    {
      $user = new User;
      return View::make('admin.users.create', compact('user'));
    }
    else
    {
      Session::flash('error', 'You do not have permission to access that resource.');
      return Redirect::route('admin.users.index');
    }

  }

  public function store()
  {
    $user = User::create(
      Input::only('email','name','password','role')
    );

    Session::flash('info', 'New user was successfully created.');
    return Redirect::route('admin.users.index');
  }

  public function checkEmailExists()
  {
    $user = User::where('email', Input::get('email'))->first();

    if ($user)
    {
      $data = ['match_found' => true, 'message' => 'User email already exists'];
    }
    else
    {
      $data = ['match_found' => false, 'message' => 'User email available'];
    }

    return Response::json($data, 200);

  }

}
