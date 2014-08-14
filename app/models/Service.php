<?php

class Service extends \Eloquent {
	protected $fillable = ['title', 'description', 'introduction', 'image_path'];

  public static function sorted()
  {
    return static::orderBy('sort_order', 'asc')->get( ['id', 'title', 'introduction', 'image_path'] );
  }
}
