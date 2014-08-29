<?php namespace App\Controllers\Admin;

use \Enquiry;
use \View;

class DashboardController extends \BaseController {


  public function index()
  {
    return View::make('admin.dashboard');
  }

}
