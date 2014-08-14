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

Route::get('/', function()
{
	View::composer('contents', 'Horizon\Composers\ContentComposer');
	

	$about = Content::where('name', 'about')->first();

	return View::make('home', compact('about'));
});

Route::get('/debug', function(){
	// $contents = DB::table('contents')->remember(30)->get();
	$contents = array("name"=>"Brian", "age"=>37);
  new Horizon\Utilities\Utils("contents");
});
