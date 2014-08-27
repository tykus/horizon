<?php namespace App\Controllers\Admin;

use \Enquiry;
use \View;

class DashboardController extends \BaseController {


  public function index()
  {
    $enquiries = Enquiry::sorted()->unread()->get(); //TODO: remove this functionality to a composer

    return View::make('admin.dashboard')->with('enquiries', $enquiries);
  }

}
