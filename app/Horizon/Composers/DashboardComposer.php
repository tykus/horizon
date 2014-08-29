<?php namespace Horizon\Composers;

use \AccessLog;
use \Auth;
use \Enquiry;
use \View;

class DashboardComposer {

  public function compose($view)
  {
    $access_logs = AccessLog::where('email', Auth::user()->email)->limit(5)->get();
    $enquiries = Enquiry::sorted()->unread()->paginate(10);

    return $view->with('access_logs', $access_logs)
                ->with('enquiries', $enquiries);
  }

}
