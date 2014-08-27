<?php

class Faq extends \Eloquent {

	protected $fillable = ['question','answer'];

  public function scopeSorted($query)
  {
    $query->orderBy('sort_order', 'asc');
  }

}
