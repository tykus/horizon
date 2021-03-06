@extends('layouts.admin')

@section('content')
  <div id="users">
    <h1 class="page-heading">New User</h1>

    {{ Form::model($user, ['route'=>'admin.users.store', 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'user-form']) }}
    @include('admin.users._form')

    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        {{ Form::submit('Create User', array('class'=>'btn btn-default')) }}
      </div>
    </div>
    {{ Form::close() }}
  </div>
@stop
