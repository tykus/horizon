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
    if (Input::get('captcha') != '')
    {
      $message = ['message'=>'Thanks!'];
      return Response::json($message, 200);
    }

    $user = User::whereName('Robert')->first();
    // Todo: validate & sanitize!!!
    $enquiry = Enquiry::create(Input::only('name', 'email', 'telephone', 'message'));
    $this->mailer->forward($user, $enquiry->toArray());
  }


}
