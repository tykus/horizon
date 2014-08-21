<?php

use Illimunate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      'Horizon\Repositories\ArticleRepositoryInterface',
      'Horizon\Repositories\EloquentArticleRepository'
    );
  }

}
