<?php namespace App\Controllers\Admin;

use Article;
use View;
use Input;
use Response;
use Request;
use Redirect;
use Carbon\Carbon;


class ArticlesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /articles
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest()->get();
		return View::make('admin.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /articles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$article = new Article;
		return View::make('admin.articles.create', compact('article'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /articles
	 *
	 * @return Response
	 */
	public function store()
	{
		$article = new Article;
		$article->fill(Input::get());
		if (Input::has('publish'))
		{
			$article->published_date = Carbon::now()->toDateString();
		}
		$article->save();

		return Redirect::action('admin.articles.index');
	}

	/**
	 * Display the specified resource.
	 * GET /articles/{val}
	 *
	 * @param  mixed  $val
	 * @return Response
	 */
	public function show($val)
	{

		if (is_numeric($val))
		{
			$article = Article::find($val);
		}
		else
		{
			$article = Article::where('slug', $val)->get();
		}

		if (Request::ajax())
		{
			return Response::json($article->toArray(), 200);
		}
		else
		{
			return View::make('admin.articles.show', compact('article'));
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /articles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::find($id);
		return View::make('admin.articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$article = Article::find($id);

		$article->update(Input::get());

		if (Input::has('publish'))
		{
		  $article->update( ['published_date' => Carbon::now()->toDateString()] );
		}
		else
		{
		  $article->update( ['published_date' => null] );
		}

		if (Request::ajax())
    {
      return Response::json($article->toArray(), 200);
    }
    else
    {
      return Redirect::action('admin.articles.index')->with('flash', 'Article successfully updated');
    }
	}

	public function updatePublishedDate($id)
	{
		$article = Article::find($id);
		if ( Input::has('publish') )
    {
      $publish = json_decode(Input::get('publish'));

      if ($publish)
      {
        $article->update( ['published_date' => Carbon::now()] );
      }
      else
      {
        $article->update( ['published_date' => null] );
      }
    }

    return Response::json($article->toArray(), 200);
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::find($id)->delete();
		return Response::json(null, 204);
	}

}
