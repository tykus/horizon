@extends('layouts.admin')

@section('content')
  <div id="services">
    <h1 class="page-header">Edit Service</h1>

    <div class="row">
      <div class="col-sm-10">
        {{ Form::model($service, [
            'route' => array('admin.services.update', $service->id),
            'class'=>'form-horizontal',
            'files' => true,
            'method' => 'PUT'
          ]) }}
        <div class="form-group">
          {{Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('title', e($service->title), array('class'=>'form-control')) }}
          </div>
        </div>

        <div class="form-group">
          {{Form::label('introduction', 'Introduction', array('class'=>'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::textarea('introduction', e($service->introduction), array('class'=>'form-control')) }}
          </div>
        </div>

        <div class="form-group">
          {{Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::textarea('description', e($service->description), array('class'=>'form-control')) }}
          </div>
        </div>

        <div class="form-group">
          {{Form::label('image', 'Image', array('class'=>'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::file('image') }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            {{ Form::submit('Save', array('class'=>'btn btn-default')) }}
          </div>
        </div>

        {{ Form::close() }}
      </div>

      <div class="col-sm-2">
        {{ HTML::image($service->image_path, $service->title, ['class'=>'img-thumbnail']) }}
      </div>
    </div>
@stop

@include('admin.common.summernote')
