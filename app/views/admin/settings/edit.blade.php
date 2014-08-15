@extends('layouts.admin')

@section('content')
	
	<div id="settings" class="row">
		<div class="col-lg-12">
			
		<h2 class="page-heading">Update Setting</h2>
		{{ Form::model($setting, [
			'route'=>['admin.settings.update', $setting->id],
			'class'=>'form-horizontal',
			'method'=>'PUT',
			'id' => 'edit-setting-form'
		]) }}

		<div class="form-group">
		  {{Form::label('value', ucfirst($setting->key), array('class'=>'col-sm-2 control-label')) }}
		  <div class="col-sm-10">
		    {{ Form::text('value', $setting->value, array('class'=>'form-control')) }}
		  </div>
		</div>

		<div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
		    <button type="submit" class="btn btn-default">
		    	Update <i class="fa fa-spinner fa-spin" style="display:none"></i>
		    </button>
		  </div>
		</div>

		{{ Form::close() }}

		</div>
	</div>

@stop