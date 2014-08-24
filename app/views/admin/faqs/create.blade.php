@extends('layouts.admin')

@section('content')

	<div id="faqs">
	  <h1 class="page-header">New FAQ</h1>
		
		{{ Form::model($faq, ['route'=>'admin.faqs.store', 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'faq-form']) }}

		@include('admin.faqs._form')

		<div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
		    <button type="submit" class="btn btn-default">
		    	Add <i class="fa fa-spinner fa-spin" style="display:none"></i>
		    </button>
		  </div>
		</div>

		<div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
				{{ HTML::linkRoute('admin.faqs.index', 'Back to index', null, ['class'=>'btn btn-default']) }}
		  </div>
		</div>

		{{ Form::close() }}
	</div>

@stop

@section('scripts')
	{{-- @include('common.summernote') --}}
@stop