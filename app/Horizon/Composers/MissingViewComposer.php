<?php namespace Horizon\Composers;

use \Article;
use \Faq;
use \Service;

class MissingViewComposer {

	public function compose($view)
	{
		$articles = Article::latest()->get();
		$services = Service::sorted()->get();

		return $view->with('articles', $articles)
								->with('services', $services);
	}

}