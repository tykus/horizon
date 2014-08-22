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
Route::get('/articles', ['uses' => 'ArticlesController@index', 'as' => 'articles_path']);
Route::get('/articles/{articles}', ['uses' => 'ArticlesController@show', 'as' => 'article_path']);



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(array('namespace'=>'App\\Controllers'), function(){

  Route::group(array('namespace'=>'Admin', 'prefix'=>'admin'), function(){

		View::composer('layouts.admin', 'Horizon\Composers\SettingsComposer');

    Route::get('/', array('uses' => 'DashboardController@index'));

    // TODO: better not to use resourceful routing if not all routes are implemented
    Route::post('enquiries/reply', array('uses' => 'EnquiriesController@reply'));
    Route::resource('enquiries', 'EnquiriesController');

    Route::resource('services', 'ServicesController');
    Route::resource('articles', 'ArticlesController');
    Route::put('articles/publish/{articles}', array('uses' => 'ArticlesController@updatePublishedDate'));
    Route::resource('settings', 'SettingsController');

  });

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
