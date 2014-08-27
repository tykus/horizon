@extends('layouts.site')

@section('content')
  <div class="container">
    <h1 class="page-heading">Articles</h1>

    @foreach($articles as $article)
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">{{ $article->title }}</h3>
        </div>
        <div class="panel-body">
          {{ Str::limit($article->content, 200) }}
        </div>
        <div class="panel-footer">
          {{ $article->published_date }}
          {{ HTML::linkRoute('article_path', 'more...', $article->slug, ['class'=>'pull-right']) }}
        </div>
      </div>
    @endforeach

    {{ $articles->links() }}
  </div>
@stop
