<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Error extends \Eloquent {
	use SoftDeletingTrait;

	protected $fillable = ['url', 'description'];
  protected $softDelete = true;

  public function scopeLatest($query)
  {
    $query->orderBy('created_at', 'desc')->limit(10);
  }

}
