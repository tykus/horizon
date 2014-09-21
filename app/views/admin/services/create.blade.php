@extends('layouts.admin')

@section('content')
  <div id="services">
    <h1 class="page-header">New Service</h1>

    <div class="row">
      <div class="col-sm-10">
        {{ Form::model($service, [
            'route' => 'admin.services.store',
            'class'=>'form-horizontal',
            'files' => true,
            'method' => 'POST'
          ]) }}

        @include('admin.services._form')

        {{ Form::close() }}
      </div>

    </div>
@stop

@include('admin.common.summernote')
