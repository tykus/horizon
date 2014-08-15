<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
  'uses' => 'HomeController@index',
  'as' => 'home_path'
]);


// ADMIN ROUTES

Route::group(array('namespace'=>'App\\Controllers'), function(){

  Route::group(array('namespace'=>'Admin', 'prefix'=>'admin'), function(){

  	// TODO: work out where this should really belong!!!
  	View::composer('layouts.admin', function($view)
		{
		    $view->with('settings', Setting::all());
		});


    Route::get('/', array('uses' => 'DashboardController@index'));

    // TODO: better not to use resourceful routing if not all routes are implemented
    Route::resource('enquiries', 'EnquiriesController');
    Route::post('enquiries/reply', array('uses' => 'EnquiriesController@reply'));

    Route::resource('services', 'ServicesController');
    Route::resource('settings', 'SettingsController');

  });

});
