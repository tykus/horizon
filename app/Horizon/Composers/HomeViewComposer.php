<?php namespace Horizon\Composers;

  use \Service;
  use \Content;

  class HomeViewComposer {

    public function compose($view)
    {
      $about = Content::where('page', 'about')->first();
      $services = Service::sorted();

      $view->with('about', $about)
           ->with('services', $services);
    }

  }
