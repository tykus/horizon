<?php

class Error extends \Eloquent {
	protected $fillable = ['url', 'description'];

  protected $softDelete = true;

  public function scopeLatest($query)
  {
    $query->orderBy('created_at', 'desc');
  }

}
