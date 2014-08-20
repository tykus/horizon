@extends('layouts.site')

@section('content')

  <div id="faqs" class="container">
  	<h2 class="page-heading">Frequently Asked Questions</h2>
		@foreach ($faqs as $faq)
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">{{ $faq->question }}</h3>
			  </div>
			  <div class="panel-body">
			    {{ $faq->answer }}
			  </div>
			</div>
		@endforeach
	</div>

@stop