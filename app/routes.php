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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home_path']);
Route::get('/articles', ['uses' => 'ArticlesController@index', 'as' => 'articles_path']);
Route::get('/articles/{articles}', ['uses' => 'ArticlesController@show', 'as' => 'article_path']);

Route::get('/debug', function(){
  echo Carbon\Carbon::now()->toDateString();
});


// ADMIN ROUTES

Route::group(array('namespace'=>'App\\Controllers'), function(){

  Route::group(array('namespace'=>'Admin', 'prefix'=>'admin'), function(){
    Route::get('/', array('uses' => 'DashboardController@index'));

    Route::resource('enquiries', 'EnquiriesController');
    Route::post('enquiries/reply', array('uses' => 'EnquiriesController@reply'));

    Route::resource('services', 'ServicesController');
    Route::resource('articles', 'ArticlesController');
    Route::put('articles/publish/{articles}', array('uses' => 'ArticlesController@updatePublishedDate'));

  });

});
