<?php

class Enquiry extends \Eloquent {
	protected $fillable = ['name','email','telephone','message','viewed'];

	public static $rules = [
		'name' => 'required',
		'email' => 'required|email',
		'telephone' => 'required',
	];


  public function scopeSorted($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  public function scopeUnread($query)
  {
    return $query->whereViewed(false);
  }
}
