@extends('layouts.site')

@section('content')
  <div id="content" class="container">
		<div class="col-md-4">
			{{ HTML::image($service->image_path, $service->title, ['class'=>'img-thumbnail']) }}
		</div>

		<div class="col-lg-8">
	  	<h2 class="page-heading">{{ $service->title }}</h2>
	  	<div class="lead">{{ $service->description }}</div>
		</div>
	</div>
@stop