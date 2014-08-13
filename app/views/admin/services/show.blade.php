@extends('layouts.admin')

@section('content')
  <h1 class="page-header">Service Details</h1>

  <div class="row">
    <div class="col-lg-10">
      <h2>Title</h2>
      <p class="lead">{{{ $service->title }}}</p>

      <h2>Introduction Text <span class="text-muted">(appears on homepage only)</span></h2>
      <p class="lead">{{{ $service->introduction }}}</p>

      <h2>Full Description</h2>
      <p class="lead">{{{ $service->description }}}</p>
    </div>
    <div class="col-lg-2">
      {{ HTML::image($service->image_path, $service->title, ['class'=>'img-thumbnail']) }}
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      {{ HTML::linkRoute('admin.services.index', 'Back to index', null, ['class'=>'btn btn-default']) }}
    </div>
  </div>

@stop
