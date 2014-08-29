<?php
  // TODO: remove! this is only for templating
  $faker = Faker\Factory::create();
?>

@extends('layouts.admin')

@section('sidebar')
  <div class="alert alert-info">
    You can manage the content of your site from here!
  </div>
  <div class="alert alert-info">
    Developer / maintenance notes will be posted here if needed.
  </div>
@stop

@section('content')

  <h1 class="page-header">Dashboard</h1>

  <div class="row">
    <div id="inbox" class="col-lg-6">
      <h2>Unread Enquiries</h2>
      @if (count($enquiries))
        <table class="table table-striped">
          <tr>
            <th>Date</th>
            <th>Name</th>
            <th></th>
          </tr>
          @foreach($enquiries as $enquiry)
            <tr @unless($enquiry->viewed) class="info" @endunless>
              <td>{{{ $enquiry->created_at }}}</td>
              <td>{{{ $enquiry->name }}}</td>
              <td>{{ HTML::linkRoute('admin.enquiries.show', 'Show', $enquiry->id, ['class'=>'btn btn-default pull-right']) }}</td>
            </tr>
          @endforeach
        </table>
      @else
        <p><em>No unread enquiries.</em></p>
      @endif
      {{ $enquiries->links() }}
      {{ HTML::linkRoute('admin.enquiries.index', 'Go to inbox', null, ['class'=>'btn btn-default pull-right']) }}
    </div>

    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          @include('admin.accesslogs._index')
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2>Site Errors</h2>
          @include('admin.accesslogs._index')
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-lg-12">
      <h2>Google Analytics</h2>
    </div>

  </div>

@stop
