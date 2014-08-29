<?php namespace Horizon\Utilities;

use \Request;

class Geolocate {

  protected $api;

  public function __construct(Api $api)
  {
    $this->api = $api;
  }

  /**
   * @return Array
   */
  public function make()
  {
    $url = "http://freegeoip.net/json/" . Request::getClientIp();
    $result = $this->api->request($url);
    return json_decode($result->original, true);
  }

}
