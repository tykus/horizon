@extends('layouts.admin')

@section('content')

	<h2 class="page-heading">Frequently Asked Questions</h2>

	@foreach ($faqs as $faq)
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title" contenteditable>{{ $faq->question }}</h3>
		  </div>
		  <div class="panel-body" contenteditable>
		    {{ $faq->answer }}
		  </div>
		</div>
	@endforeach

@stop

@section('sidebar')
	<div class="alert alert-info">
		This content is editable in place.
	</div>

@stop