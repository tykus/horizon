<?php

class Service extends \Eloquent {
	protected $fillable = ['title', 'description', 'introduction', 'image_path', 'slug'];

  public function scopeSorted($query)
  {
    return $query->orderBy('sort_order', 'asc');
  }
}
