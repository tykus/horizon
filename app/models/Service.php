<?php

class Service extends \Eloquent {
	protected $fillable = ['title', 'description', 'introduction', 'image_path', 'slug'];

  // TODO: change this to a scoped query
  public static function sorted()
  {
    return static::orderBy('sort_order', 'asc')->get( ['id', 'title', 'introduction', 'image_path', 'slug'] );
  }

  public function scopeSorted($query)
  {
    return $query->orderBy('sort_order', 'asc');
  }
}
