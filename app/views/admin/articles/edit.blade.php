@extends('layouts.admin')

@section('content')
  <div id="articles" class="row">
    <div class="col-lg-12">
      <h2 class="page-heading">Edit Article</h2>

      {{ Form::model($article, ['route'=>['admin.articles.update',$article->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'id'=>'article-form']) }}

      @include('admin.articles._form', compact('article'))

      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-0 col-lg-offset-2">
          {{ Form::submit('Update Article', ['class'=>'btn btn-success']) }}
          {{ HTML::linkRoute('admin.articles.index', 'Back to Index (cancel)', null, ['class'=>'btn btn-default']) }}
        </div>
      </div>

      {{ Form::close() }}
    </div>
  </div>
@stop

@include('common.summernote')
