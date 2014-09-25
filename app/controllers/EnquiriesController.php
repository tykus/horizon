<?php


class EnquiriesController extends \BaseController {

  /**
   * Receives an enquiry thru the contact form
   */
  public function store()
  {
    if (Input::get('captcha') != '')
    {
      # If captcha field is not blank, likely its a Bot, don't send the enquiry.
      $response = ['message'=>'Thanks!'];
      return Response::json($response, 200);
    }

    $data = Input::only('name', 'email', 'telephone', 'body');

    $v = Validator::make($data, Enquiry::$rules);
    if ($v->fails())
      return Response::json(['message'=>'Problem with enquiry submission'], 400);

    $enquiry = Enquiry::create($data);
    $event = Event::fire('enquiry.received', [$enquiry->toArray()]);

    if (Request::ajax())
      return Response::json(['message'=>'Your enquiry has been sent, thank you'], 200);
    else
      return Redirect::back();

  }


}
