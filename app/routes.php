<?php

Event::listen('illuminate.query', function($query){
	Log::write('info', $query);
});


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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home_path']);


// ADMIN ROUTES
Route::group(array('namespace'=>'App\\Controllers'), function(){

  Route::group(array('namespace'=>'Admin', 'prefix'=>'admin'), function(){

		View::composer('layouts.admin', 'Horizon\Composers\SettingsComposer');

    Route::get('/', array('uses' => 'DashboardController@index'));

    // TODO: better not to use resourceful routing if not all routes are implemented
    Route::post('enquiries/reply', array('uses' => 'EnquiriesController@reply'));
    Route::resource('enquiries', 'EnquiriesController');

    Route::resource('services', 'ServicesController');
    Route::resource('settings', 'SettingsController');
    // TODO: add after-filter to the update action to bust the cache & reset it

  });

});
