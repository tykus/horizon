<?php

use Horizon\Mailers\UserMailer;

class EnquiriesController extends \BaseController {

  protected $mailer;

  public function __construct(UserMailer $mailer)
  {
    $this->mailer = $mailer;
  }

  /**
   * Receives an enquiry thru the contact form
   */
  public function store()
  {
    $user = User::whereName('Robert')->first();
    // Todo: validate & sanitize!!!
    $enquiry = Enquiry::create(Input::only('name', 'email', 'telephone', 'message'));
    $this->mailer->forward($user, $enquiry->toArray());
  }


}
