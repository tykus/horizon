<?php namespace App\Controllers\Admin;

use \View as View;
use App\Models\Enquiry as Enquiry;

class DashboardController extends \BaseController {


  public function index()
  {
    $enquiries = Enquiry::all();

    return View::make('admin.dashboard')->with('enquiries', $enquiries);
  }

}
