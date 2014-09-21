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
      # If the captcha field has been filled out, it is likely a Bot
      # Don't send the enquiry.
      $message = ['message'=>'Thanks!'];
      return Response::json($message, 200);
    }

    # @TODO: find the user a better way!!!
    $user = User::whereName('Robert')->first();
      
    $data = Input::only('name', 'email', 'telephone', 'message');
    $v = Validator::make($data, Enquiry::$rules);
    if ($v->passes())
    {
      # @TODO: fire an event - enquiry received
      $enquiry = Enquiry::create($data);
      return Response::json(['message'=>'Your enquiry has been sent, thank you'], 200);
    } else {
      return Response::json(['message'=>'Problem with enquiry submission'], 400);
    }
    # Fire an event here "enquiryReceived" and listen for it in the global.php file
    // $this->mailer->forward($user, $enquiry->toArray());
  }


}
