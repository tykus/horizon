<?php namespace Horizon\Mailers;

use \User;

class UserMailer extends Mailer {

  protected $view_data;

  public function forward(User $user, $data)
  {
    $view = 'emails.forward';
    $subject = "Website Enquiry - {$data['name']}";

    return $this->sendTo($user, $subject, $view, $data);
  }

}
