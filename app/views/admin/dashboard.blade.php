@extends('layouts.admin')

@section('content')

  <h1 class="page-header">Dashboard</h1>

  <div class="row">
    <div class="col-lg-12">
      @include('admin.enquiries._index')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      @include('admin.accesslogs._index')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      @include('admin.errors._index')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h2>Google Analytics</h2>
    </div>
  </div>

@stop
