<?php

class ArticlesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /articles
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latestPublished()->paginate(3);
		return View::make('site.articles.index', compact('articles'));
	}

	/**
	 * Display the specified resource.
	 * GET /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$article = Article::where('slug', $slug)->first();

		if ($article)
		{
			return View::make('site.articles.show', compact('article'));
		}
		else
		{
			return Redirect::route('articles_path');
		}
	}

}
