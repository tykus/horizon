<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home_path']);
Route::get('/articles', ['uses' => 'ArticlesController@index', 'as' => 'articles_path']);
Route::get('/articles/{articles}', ['uses' => 'ArticlesController@show', 'as' => 'article_path']);

Route::get('/debug', function(){
  echo Carbon\Carbon::now()->toDateString();
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

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
