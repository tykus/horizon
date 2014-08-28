<?php

class Enquiry extends \Eloquent {
	protected $fillable = ['name','email','telephone','message','viewed'];

  public function scopeSorted($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  public function scopeUnread($query)
  {
    return $query->whereViewed(false);
  }
}
