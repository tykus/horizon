<?php namespace Horizon\Mailers;

use Horizon\Guest;

class GuestMailer extends Mailer {

  public function reply(Guest $guest, $data)
  {
    $view = 'emails.reply';
    $subject = $data['subject'] || "Thank you for your enquiry.";
    $viewData = $data;

    return $this->sendTo($guest, $subject, $view, $viewData);
  }

}
