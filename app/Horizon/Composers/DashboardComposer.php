<?php namespace Horizon\Composers;

use \AccessLog;
use \Auth;
use \Enquiry;
use \Error;
use \View;

class DashboardComposer {

  public function compose($view)
  {
    $access_logs = AccessLog::byUser(Auth::user())->latest()->limit(5)->get();
    $enquiries = Enquiry::sorted()->unread()->paginate(10);
    $errors = Error::latest()->limit(10)->get();

    return $view->with('access_logs', $access_logs)
                ->with('errors', $errors)
                ->with('enquiries', $enquiries);
  }

}
