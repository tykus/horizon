@extends('layouts.site')

@section('content')

  <div id="faqs" class="container">
		<div class="col-md-12">

	  	<h2 class="page-heading">Frequently Asked Questions</h2>

	  	<ul>
	  	@foreach($faqs as $faq)
	  		<li>{{ HTML::link('#' . $faq->id, $faq->question) }}</li>
	  	@endforeach
	  	</ul>

			@foreach ($faqs as $faq)
				<div id="{{ $faq->id }}" class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{ $faq->question }}</h3>
				  </div>
				  <div class="panel-body">
				    {{ $faq->answer }}
				  </div>
				</div>
			@endforeach

		</div>
	</div>

@stop