<?php namespace Horizon\Events;

use \User;
use Horizon\Mailers\UserMailer;

class EnquiryEventListener extends EventListener {

  protected $mailer;

  public function __construct(UserMailer $mailer)
  {
    $this->mailer = $mailer;
    $this->getUser();
  }

  public function handle($data)
  {
    $this->mailer->forward($this->user, $data);
  }

  private function getUser()
  {
    $this->user = User::where('email', 'brian@tykus.ie')->first(); # this is redundant!!!
  }

}
