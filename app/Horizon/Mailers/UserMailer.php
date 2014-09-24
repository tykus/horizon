<?php namespace Horizon\Mailers;

use \User;

class UserMailer extends Mailer {

  protected $view_data;

  public function forward(User $user, $data)
  {
    $view = 'emails.forward';
    $this->setupViewData($data);

    return $this->sendTo($user, $this->view_data['subject'], $view, $this->view_data);
  }

  /**
   * setupViewData()
   */
  private function setupViewData($data)
  {
    $data['body'] = $data['message']; # var name collision in the Mailer class
    unset($data['message']);
    $data['subject'] = "Enquiry received thru website.";
    $this->view_data = $data;
  }

}
