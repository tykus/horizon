@extends('layouts.admin')

@section('content')

  <h1 class='page-heading'>Admin Access Details</h1>

  <dl class="dl-horizontal">
    <dt>Date</dt>
    <dd>{{ $access_log->created_at }}</dd>
    <dt>Login Email Address</dt>
    <dd>{{ $access_log->email }}</dd>
    <dt>Login Success</dt>
    <dd>{{ $access_log->success ? 'yes' : 'no' }}</dd>
    <dt>IP Address</dt>
    <dd>{{ $access_log->ip }}</dd>
    <dt>Region Code</dt>
    <dd>{{ $access_log->region_code }}</dd>
    <dt>Region Name</dt>
    <dd>{{ $access_log->region_name }}</dd>
    <dt>Zip Code</dt>
    <dd>{{ $access_log->zipcode }}</dd>
    <dt>Latitude</dt>
    <dd>{{ $access_log->latitude }}</dd>
    <dt>Longitude</dt>
    <dd>{{ $access_log->longitude }}</dd>
    <dt>Metro Code</dt>
    <dd>{{ $access_log->metro_code }}</dd>
    <dt>Area Code</dt>
    <dd>{{ $access_log->area_code }}</dd>
    <dt>City</dt>
    <dd>{{ $access_log->city }}</dd>
    <dt>Country</dt>
    <dd>{{ $access_log->country_name }}</dd><dt>Flag</dt>
    <dd class="f32"><i class="flag {{ strtolower($access_log->country_code) }}"></i></dd>
  </dl>

  <div class="alert alert-warning">
    If <strong>any</strong> of the information above seems unusual, or spurious, you should change your password immediately!
  </div>
@stop

