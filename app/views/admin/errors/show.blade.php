@extends('layouts.admin')

@section('content')

  <h1 class='page-heading'>Error Details</h1>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        URL: {{ $error->url }}
      </h3>
    </div>
    <div class="panel-body">
      <samp>{{ nl2br($error->description) }}</samp>
    </div>
    <div class="panel-footer">
      {{ $error->created_at }}
    </div>
  </div>

@stop
