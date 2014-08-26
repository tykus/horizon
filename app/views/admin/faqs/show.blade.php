@extends('layouts.admin')

@section('content')
	<h1 class="page-heading">Frequently Asked Questions</h1>

	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">{{ $faq->question }}</h3>
	  </div>
	  <div class="panel-body">
	    {{ $faq->answer }}
	  </div>
	</div>

	{{ HTML::linkRoute('admin.faqs.index', 'Back to index', null, ['class'=>'btn btn-default']) }}
	{{ HTML::linkRoute('admin.faqs.edit', 'Edit FAQ', $faq->id, ['class'=>'btn btn-default']) }}
@stop