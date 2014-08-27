@extends('layouts.site')

@section('content')
  <h1 class="page-heading">{{ $article->title }}</h1>
  <p class="text-muted">{{ $article->published_date }}</p>

  {{ $article->content }}

  <div class="actions">
    {{ HTML::linkRoute('articles_path', 'Back to Articles', null, ['class'=>'btn btn-default']) }}
  </div>

@stop
