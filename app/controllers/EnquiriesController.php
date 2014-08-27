<?php

class EnquiriesController extends \BaseController {

  /**
   * Receives an enquiry thru the contact form
   */
  public function store()
  {
    Enquiry::create(Input::only('name', 'email', 'telephone', 'message'));
  }


}
