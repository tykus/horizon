@extends('layouts.site')

@section('content')
  <div id="article">
    <div id="home" class="intro-header"></div>
    <div class="container">
      <h1 class="page-heading">{{ $article->title }}</h1>
      <p class="text-muted">{{ $article->published_date }}</p>

      <div class="lead">{{ $article->content }}</div>

      <div class="actions">
        {{ HTML::linkRoute('articles_path', 'Back to Articles', null, ['class'=>'btn btn-default']) }}
      </div>
    </div>
  </div>
@stop
