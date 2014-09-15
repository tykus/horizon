@extends('layouts.admin')

@section('content')
  <h1 class="page-heading">Access Logs</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>Email</th>
        <th>IP Address</th>
        <th>City</th>
        <th>Country</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($access_logs as $accesslog)
      <tr @unless($accesslog->login_success) class="danger" @endunless>
        <td>{{ $accesslog->created_at }}</td>
        <td>{{ $accesslog->email }}</td>
        <td>{{ $accesslog->ip }}</td>
        <td>{{ $accesslog->city }}</td>
        <td class="f32">
          <i class="flag {{ strtolower($accesslog->country_code) }}"></i>
          {{ $accesslog->country_code }}
        </td>
        <td>{{ HTML::linkRoute('admin.accesslogs.show', 'Show', $accesslog->id, ['class'=>'btn btn-default'] ) }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $access_logs->links() }}
@stop
