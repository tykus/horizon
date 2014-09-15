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
    	$data = file_get_contents($url);
    }

    $response = Response::make($data, 200);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

}