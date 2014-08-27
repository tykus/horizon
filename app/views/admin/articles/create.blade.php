@extends('layouts.admin')

@section('content')
  <div id="articles" class="row">
    <div class="col-lg-12">
      <h2 class="page-heading">Add Article</h2>

      {{ Form::model($article, ['route'=>'admin.articles.store', 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'article-form']) }}

      @include('admin.articles._form', compact('article'))

      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-0 col-lg-offset-2">
          {{ Form::submit('Add Article', ['class'=>'btn btn-default']) }}
        </div>
      </div>

      {{ Form::close() }}
    </div>
  </div>
@stop

@include('admin.common.summernote')
