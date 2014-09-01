@extends('layouts.admin')

@section('content')

  <div id="contents" class="row">
    <div class="col-lg-12">

    <h2 class="page-heading">Update <u>{{ ucfirst($content->page) }}</u> Content</h2>
    {{ Form::model($content, [
      'route'=>['admin.contents.update', $content->id],
      'class'=>'form-horizontal',
      'method'=>'PUT',
      'id' => 'edit-content-form'
    ]) }}

    <div class="form-group">
      {{Form::label('content', ucfirst($content->key), array('class'=>'col-sm-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::textarea('content', $content->content, array('class'=>'form-control')) }}
      </div>
    </div>

    {{-- TODO: add image uploading and resizing --}}

    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-default">
          Update <i class="fa fa-spinner fa-spin" style="display:none"></i>
        </button>
      </div>
    </div>

    {{ Form::close() }}

    </div>
  </div>

@stop

@include('admin.common.summernote')
