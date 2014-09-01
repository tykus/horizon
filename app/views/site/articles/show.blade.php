@extends('layouts.site')

@section('content')
  <div id="article">
    <div class="container">
      <h1 class="page-heading">{{ $article->title }}</h1>
      <p class="text-muted">{{ $article->published_date->format('l j F Y h:i a') }}</p>

      <div class="lead">{{ $article->content }}</div>

      <div class="actions">
        {{ HTML::linkRoute('articles_path', 'Back to Articles', null, ['class'=>'btn btn-default']) }}
      </div>
    </div>
  </div>
@stop
