<?php

class AccessLog extends \Eloquent {
	protected $fillable = ['email','login_success','ip','country_code','country_name','region_code','region_name','city','zipcode','latitude','longitude','metro_code','area_code'];
}
