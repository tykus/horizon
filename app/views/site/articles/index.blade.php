@extends('layouts.site')

@section('content')
  <div class="container">
    <h1 class="page-heading">Articles</h1>

    @foreach($articles as $article)
      <div class="article">
        <hr>
        <h3>{{ $article->title }}</h3>
        {{ Str::limit($article->content, 200) }}
        <p class="text-muted">{{ $article->published_date->diffForHumans() }}</p>
        <p>{{ HTML::linkRoute('article_path', 'more...', $article->slug, ['class'=>'btn btn-xs btn-default']) }}</p>
      </div>
    @endforeach

  </div>
@stop
