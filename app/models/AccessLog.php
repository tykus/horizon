<?php

class AccessLog extends \Eloquent {
	protected $fillable = ['email','login_success','ip','country_code','country_name','region_code','region_name','city','zipcode','latitude','longitude','metro_code','area_code'];

  public function scopeByUser($query, $user)
  {
    return $query->where('email', $user->email);
  }

  public function scopeLatest($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  public function getLocation()
  {

    // $url = "http://freegeoip.net/json/" . Request::getClientIp();
    $url = "http://freegeoip.net/json/78.143.132.214";

    if (!function_exists('curl_init')){
          die('Sorry cURL is not installed!');
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);

    return json_decode($output, true);

  }


}
