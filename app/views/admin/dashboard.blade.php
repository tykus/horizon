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
      {{ HTML::linkRoute('admin.enquiries.index', 'Go to inbox', null, ['class'=>'btn btn-default pull-right']) }}
    </div>

    <div id="media" class="col-lg-6">
      <h2>Media Manager </h2>
      <p>All of the image files being used on the client-side of the application will be managed from here.</p>
      {{-- TODO: remove! this is only for templating --}}
      @foreach(range(1, 10) as $index)
        <img src="{{ $faker->imageUrl($width = 120, $height = 120, 'cats') }}" class="img-thumbnail img-responsive">
      @endforeach
    </div>

  </div>

  <div class="row">

    <div class="col-lg-4">
      <h2>Google Analytics</h2>
    </div>

    <div class="col-lg-3">
      <h2>Access Log</h2>
    </div>

    <div class="col-lg-4">
      <h2>Site Errors</h2>
      <table class="table table-striped">
        <tr>
          <th>Date</th>
          <th>Description</th>
        </tr>
      @foreach(range(1, 10) as $index)
        <tr>
          <td>{{{ $faker->date }}}</td>
          <td>{{{ $faker->sentence(6) }}}</td>
        </tr>
      @endforeach
      </table>
    </div>

  </div>

@stop
