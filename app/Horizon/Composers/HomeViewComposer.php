<?php namespace Horizon\Composers;

  use \Service;
  use \Setting;

  class HomeViewComposer {

    public function compose($view)
    {
      $about = Setting::where('key', 'about')->first();
      $services = Service::sorted();

      $view->with('about', $about)
           ->with('services', $services);
    }

  }
