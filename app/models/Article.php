<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Carbon\Carbon;

class Article extends \Eloquent implements SluggableInterface
{
  protected $fillable = ['title', 'slug', 'content', 'published_date'];

  use SluggableTrait;

  protected $sluggable = array(
      'build_from' => 'title',
      'save_to'    => 'slug',
      'on_update'    => true,
  );

  /**
   * getDates()
   * Specifies which properties are using Carbon
   */
  public function getDates()
  {
    return ['published_date', 'created_at', 'updated_at'];
  }

  public function scopeLatest($query)
  {
    return $query->orderBy('published_date', 'desc');
  }

  public function scopeLatestPublished($query)
  {
    return $query->orderBy('published_date', 'desc')->whereNotNull('published_date');
  }

  public function published()
  {
    return ! is_null($this->published_date);
  }

  public function publicLink()
  {
    return HTML::linkRoute('article_path', URL::route('article_path', $this->slug), $this->slug );
  }
}
