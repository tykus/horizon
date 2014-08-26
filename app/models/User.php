<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = ['password', 'remember_token'];
	protected $fillable = ['name', 'password', 'email'];

  public function isAdmin()
  {
    return Auth::user()->role == 'admin';
  }

  public function setPassword($value)
  {
    return Hash::make($value);
  }

}
