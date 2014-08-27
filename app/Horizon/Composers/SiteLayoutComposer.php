<?php namespace Horizon\Composers;

use \Faq;
use \Article;

class SiteLayoutComposer {

  public function compose($view)
  {
    $faqCount = Faq::count();
    $articleCount = Article::count();

    $view->with('faqCount', $faqCount)
         ->with('articleCount', $articleCount);
  }

}
