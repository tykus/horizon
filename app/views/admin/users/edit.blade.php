@extends('layouts.admin')

@section('content')
  <div id="users">
    <h1 class="page-heading">Edit Profile</h1>

    {{ Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'id'=>'user-form']) }}

    @include('admin.users._form')

    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        {{ Form::submit('Update Profile', array('class'=>'btn btn-default')) }}
      </div>
    </div>
    {{ Form::close() }}
  </div>
@stop
