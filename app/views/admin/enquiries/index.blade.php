@extends('layouts.admin')

@section('sidebar')
  <div class="alert alert-info">
    You can send a reply directly from the website!
  </div>
@stop

@section('content')
  <h1 class="page-header">Enquiries Inbox</h1>

  <table class="table table-striped">
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
        <td><input type="checkbox" name="enquiry-{{$enquiry->id}}"></td>
        <td>{{{ $enquiry->created_at }}}</td>
        <td>{{{ $enquiry->name }}}</td>
        <td>{{{ $enquiry->email }}}</td>
        <td>{{{ $enquiry->telephone }}}</td>
        <td>{{{ Str::limit($enquiry->message, 40) }}}</td>
        <td><button class="btn btn-default pull-right">Show</button></td>
      </tr>
    @endforeach
  </table>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="select-all"> Select All
    </label>
  </div>
  <button class="btn btn-danger">Delete selected</button>
  <button class="btn btn-default">Mark selected as read</button>
@stop
