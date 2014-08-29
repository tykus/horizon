<?php namespace Horizon\Utilities;

use \Response;

class Api {

  public function request($url="")
  {
    $data = file_get_contents($url);
    $response = Response::make($data, 200);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

}
