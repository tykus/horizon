<?php namespace App\Controllers\Admin;

use \Enquiry;
use \View;

class DashboardController extends \BaseController {


  public function index()
  {
    $enquiries = Enquiry::all();

    return View::make('admin.dashboard')->with('enquiries', $enquiries);
  }

}
