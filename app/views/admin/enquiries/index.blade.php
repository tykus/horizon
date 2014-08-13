@extends('layouts.admin')

@section('sidebar')
  <div class="alert alert-info">
    You can send a reply directly from the website!
  </div>
@stop

@section('content')
  <h1 class="page-header">Enquiries Inbox</h1>
  @if (count($enquiries))
    <table id="enquiries" class="table table-striped">
      <tr>
        <th></th>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Subject</th>
        <th></th>
      </tr>
      @foreach($enquiries as $enquiry)
        <tr @unless($enquiry->viewed) class="info" @endunless>
          <td><input type="checkbox" name="enquiry[]" data-id="{{ $enquiry->id }}"></td>
          <td>{{{ $enquiry->created_at }}}</td>
          <td>{{{ $enquiry->name }}}</td>
          <td>{{{ $enquiry->email }}}</td>
          <td>{{{ $enquiry->telephone }}}</td>
          <td>{{{ Str::limit($enquiry->message, 40) }}}</td>
          <td><a href="/admin/enquiries/{{ $enquiry->id }}" class="btn btn-default pull-right">Show</a></td>
        </tr>
      @endforeach
    </table>
    <div class="checkbox">
      <label>
        <input type="checkbox" id="select-all" data-id="seven"> Select All
      </label>
    </div>
    <button id="mark-read-button" class="btn btn-default">Mark selected as read</button>
    <button id="mark-unread-button" class="btn btn-default">Mark selected as unread</button>
    <button id="delete-button" class="btn btn-danger">Delete selected</button>
  @else
    <p>No enquiries to display.</p>
  @endif
@stop
