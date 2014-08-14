@extends('layouts.admin')

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			
		<h2 class="page-heading">Update Setting</h2>
		{{ Form::model($setting, [
			'route'=>['admin.settings.update', $setting->id],
			'class'=>'form-horizontal',
			'method'=>'PUT'
		]) }}

		<div class="form-group">
		  {{Form::label('value', ucfirst($setting->key), array('class'=>'col-sm-2 control-label')) }}
		  <div class="col-sm-10">
		    {{ Form::text('value', $setting->value, array('class'=>'form-control')) }}
		  </div>
		</div>

		<div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
		    {{ Form::submit('Update', array('class'=>'btn btn-default')) }}
		  </div>
		</div>

		{{ Form::close() }}

		</div>
	</div>

@stop