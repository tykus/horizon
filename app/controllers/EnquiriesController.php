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
      $response = ['message'=>'Thanks!'];
      return Response::json($response, 200);
    }

    # @TODO: find the user a better way, he might change this!!!
    $user = User::whereName('Robert')->first();
    $data = Input::only('name', 'email', 'telephone', 'body');

    # Validate User-supplied data
    $v = Validator::make($data, Enquiry::$rules);
    if ($v->fails())
    {
      return Response::json(['message'=>'Problem with enquiry submission'], 400);
    }

    # @TODO: fire an event - enquiry received
    $enquiry = Enquiry::create($data);
    # Fire an event here "enquiryReceived" and listen for it in the global.php file
    $this->mailer->forward($user, $enquiry->toArray());
    if (Request::ajax())
    {
      return Response::json(['message'=>'Your enquiry has been sent, thank you'], 200);
    }
    else
    {
      return Redirect::back();
    }


  }


}
