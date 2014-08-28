]@extends('layouts.admin')

@section('content')

  <h1 class="page-heading">Admin Users</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Last Login</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{{ $user->name }}}</td>
        <td>{{{ $user->email }}}</td>
        <td><em>last login</em></td>
        <td>
          @if ( $user == Auth::user() )
            {{ HTML::linkRoute('admin.users.edit', 'Edit Profile', $user->id, ['class'=>'btn btn-default']) }}
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @if (Auth::user()->isAdmin())
    {{ HTML::linkRoute('admin.users.create', 'New User', null, ['class'=>'btn btn-default']) }}
  @endif
@stop
