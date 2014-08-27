<?php


class HomeController extends BaseController {

	public function index()
	{
		return View::make('site.home');
	}

  public function terms()
  {
    return View::make('site.terms');
  }

  public function privacy()
  {
    return View::make('site.privacy');
  }

}
