@extends('layouts.site')

@section('content')
  <h1 class="page-heading">Articles</h1>

  @foreach($articles as $article)
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $article->title }}</h3>
      </div>
      <div class="panel-body">
        {{ $article->content }}
      </div>
      <div class="panel-footer">
        {{ $article->published_date }}
      </div>
    </div>
  @endforeach

  {{ $articles->links() }}
@stop
