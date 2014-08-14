<?php namespace Horizon\Composers;
 
class ContentComposer {
 
  public function compose($view)
  {
  	$contents = DB::table('content')->remember(30)->get();
    $view->with('content', $content->toArray());
  }
 
}