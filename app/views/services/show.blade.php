@extends('layouts.site')

@section('content')
<div id="service" class="container">	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-heading">Services</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			{{ HTML::image($service->image_path, $service->title, ['class'=>'img-responsive img-thumbnail']) }}
		</div>
		<div class="col-lg-8">
			<h3>{{ $service->title }}</h3>
			<p class="lead">{{ $service->description }}</p>
		</div>
	</div>
</div>
@stop