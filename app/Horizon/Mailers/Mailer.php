<?php namespace Horizon\Mailers;

use Mail;

abstract class Mailer {

  public function sendTo($user, $subject, $view, $data=array())
  {

    Mail::queue($view, $data, function($message) use($user, $subject)
    {
      $message->to($user->email)
              ->subject($subject);
    });

  }

}
