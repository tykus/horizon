@extends('layouts.admin')

@section('content')

	<div id="faqs">
	  <h1 class="page-header">Edit FAQ</h1>
		
		{{ Form::model($faq, ['route'=>['admin.faqs.update', $faq->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'id'=>'faq-form']) }}

		@include('admin.faqs._form')

		<div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
		    <button type="submit" class="btn btn-default">
		    	Update <i class="fa fa-spinner fa-spin" style="display:none"></i>
		    </button>
		  </div>
		</div>

		{{ Form::close() }}
	</div>
	
@stop

@section('scripts')
	{{-- @include('common.summernote') --}}
@stop