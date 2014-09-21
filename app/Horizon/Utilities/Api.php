<?php namespace Horizon\Utilities;

use \App;
use \Request;
use \Response;

class Api {

  public function request($url="")
  {
  	# Need to fake data in development enviroment
  	if (App::environment() == 'local')
  	{
    	$data = json_encode(['country_code'=>'CN', 'city'=>'Dalian']);
  	}
  	else
  	{
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $url);
      curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch);
      if (curl_errno($ch)) {
        echo curl_error($ch);
        echo "\n<br />";
        $data = '';
      } else {
        curl_close($ch);
      }

      if (!is_string($data) || !strlen($data)) {
        $data = json_encode(['country_code'=>'CN', 'city'=>'Dalian']); # Fallback
      }

    }

    $response = Response::make($data, 200);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

}
