<?php namespace Horizon\Repositories;

use Article;
use Carbon\Carbon;

class EloquentArticleRepository implements ArticleRepositoryInterface {

  public function all()
  {
    return Article::all();
  }

  public function getLatest()
  {
    return Article::latest()->get();
  }

  /**
   *
   */
  public function find($id)
  {
    return Article::findOrFail($id);
  }

  /**
   *
   */
  public function update($id, $data = [])
  {
    dd($data);
    $article = Article::findOrFail($id);

    if ( array_key_exists('publish', $data) )
    {
      $publish = json_decode($data['publish']);

      if ($publish)
      {
        $article->update( ['published_date' => Carbon::today()] );
      }
      else
      {
        $article->update( ['published_date' => null] );
      }
    }
    else
    {
      $article->update($data);
    }

    return $article;

  }

  public function store()
  {
    $article = new Article;
    $article->fill(Input::get());

    if ( Input::has('publish') )
    {
      $article->published_date = Carbon::create();
    }

    $article->save();
  }

  public function newEmpty()
  {
    $article = new Article;
    return $article;
  }

  public function validate()
  {

  }

  public function delete($id)
  {
    return Article::find($id)->delete();
  }

}
