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
        <td>
          {{-- TODO: ridiculous having to use foreach here - change the association to return a relation, not a collection! --}}
          @foreach($user->last_login as $login)
            <span class="f32">
              <i class="flag {{ strtolower($login->country_code) }}"></i>
            </span>
            {{ $login->country_name }} at {{ $login->created_at }}
          @endforeach
        </td>
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
