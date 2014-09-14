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

        @include('admin.services._form')

        {{ Form::close() }}
      </div>

      <div class="col-sm-2">
        {{ HTML::image($service->image_path, $service->title, ['class'=>'img-thumbnail']) }}
      </div>
    </div>
@stop

@include('admin.common.summernote')
