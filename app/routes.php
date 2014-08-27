<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// View Composers
View::composer('layouts.site', 'Horizon\Composers\SiteLayoutComposer');
View::composer('site.home', 'Horizon\Composers\HomeViewComposer');

// Home page
Route::get('/', ['uses'=>'HomeController@index', 'as'=>'home_path']);
Route::get('/terms', ['uses'=>'HomeController@terms', 'as'=>'terms_path']);
Route::get('/privacy', ['uses'=>'HomeController@privacy', 'as'=>'privacy_path']);
Route::post('/enquiries', ['uses'=>'EnquiriesController@store', 'as'=>'enquiry_path']);

// FAQs
Route::get('/faqs', ['uses'=>'FaqsController@index', 'as'=>'faqs_path']);

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

Route::group(['namespace'=>'App\\Controllers\\Admin', 'prefix'=>'admin', 'before'=>'auth'], function(){

  # Getting the Settings menu link items
	View::composer('layouts.admin', 'Horizon\Composers\SettingsComposer');

  # Dashboard
  Route::get('/', ['as'=>'dashboard_path', 'uses'=>'DashboardController@index']);

  # Enquiries
  Route::post('enquiries/reply', ['uses'=>'EnquiriesController@reply']);
  Route::resource('enquiries', 'EnquiriesController');
  Route::post('faqs/sort', array('uses'=>'FaqsController@sort'));
  Route::resource('faqs', 'FaqsController');
  Route::get('/', array('as'=>'dashboard_path', 'uses'=>'DashboardController@index'));

  # Services
  Route::resource('services', 'ServicesController');

  # Articles
  Route::put('articles/publish/{articles}', ['uses'=>'ArticlesController@updatePublishedDate']);
  Route::resource('articles', 'ArticlesController');

  # Settings
  Route::resource('settings', 'SettingsController');

  # Users
  Route::get('my-profile', ['as'=>'my-profile', 'uses'=>'UsersController@edit']);
  Route::post('/users/checkEmailExists', ['uses'=>'UsersController@checkEmailExists']);
  Route::resource('users', 'UsersController');
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
