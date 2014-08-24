@extends('layouts.admin')

@section('content')
  <div id="articles" class="row">
    <div class="col-lg-10">
      <h2 class="page-heading">Article</h2>
      <div class="row">
        <article class="col-lg-8">

          <h3>{{{ $article->title }}}</h3>
          <p class="text-muted">Public URL: {{ $article->publicLink() }}</p>
          <p class="text-muted">Published Date: {{{ $article->published_date }}}</p>

          {{ strip_tags($article->content, "<p> <a> <strong> <em> <img> <h1> <h2> <h3> <h4> <h5>") }}
        </article>
      </div>
    </div>

    <div class="col-lg-2">
      <div id="actions" class="well">
        <h3 class="page-heading">Actions</h3>
        {{ HTML::linkRoute('admin.articles.index', 'Back to index', null, ['class'=>'btn btn-default btn-block']) }}
        {{ HTML::linkRoute('admin.articles.edit', 'Edit', $article->id, ['class'=>'btn btn-default btn-block']) }}

        {{ Form::open(['route'=>'admin.articles.destroy', 'method'=>'DELETE']) }}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>

@stop
