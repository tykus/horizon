<?php

// TODO: remove this route in production
Route::get('/debug', function(){
  echo Carbon\Carbon::now()->toDateString();
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home_path']);
Route::get('/faqs', ['uses' => 'FaqsController@index', 'as' => 'faqs_path']);

// Articles
Route::get('/articles', ['uses'=>'ArticlesController@index', 'as'=>'articles_path']);
Route::get('/articles/{articles}', ['uses'=>'ArticlesController@show', 'as'=>'article_path']);

// Authentication Routes
Route::get('/login', ['as'=>'login_path', 'uses'=>'SessionsController@create']);
Route::get('/logout', ['as'=>'logout_path', 'uses'=>'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(array('namespace'=>'App\\Controllers\\Admin', 'prefix'=>'admin', 'before'=>'auth'), function(){

	View::composer('layouts.admin', 'Horizon\Composers\SettingsComposer');

  Route::post('enquiries/reply', array('uses' => 'EnquiriesController@reply'));
  Route::resource('enquiries', 'EnquiriesController');
  Route::post('faqs/sort', array('uses' => 'FaqsController@sort'));
  Route::resource('faqs', 'FaqsController');
  Route::get('/', array('as'=>'dashboard_path', 'uses'=>'DashboardController@index'));

  Route::post('enquiries/reply', array('uses'=>'EnquiriesController@reply'));
  Route::resource('enquiries', 'EnquiriesController');

  Route::resource('services', 'ServicesController');
  Route::resource('articles', 'ArticlesController');
  Route::put('articles/publish/{articles}', array('uses'=>'ArticlesController@updatePublishedDate'));
  Route::resource('settings', 'SettingsController');

});


HTML::macro('clever_link', function($route, $text) {
  if( Request::path() == $route ) {
    $active = " class = 'active'";
  }
  else {
    $active = '';
  }

  return '<li' . $active . '>' . html_entity_decode(link_to($route, $text)) . '</li>';
});
