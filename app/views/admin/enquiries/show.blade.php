@extends('layouts.admin')

@section('content')
  <h1 class="page-header">Enquiry</h1>
  <div id="enquiries" class="row">
    <div class="col-lg-12">
      <div class="lead">
        <p class="heading">From:</p>
        <p class="detail">{{{ $enquiry->name }}} &laquo; {{{ $enquiry->email }}} &raquo;</p>
      </div>
      <div class="lead">
        <p class="heading">Telephone:</p>
        <p class="detail">{{{ $enquiry->telephone }}}</p>
      </div>
      <div class="lead">
        <p class="heading">Date:</p>
        <p class="detail">{{ $enquiry->created_at }}</p>
      </div>
      <div class="lead">
        <p class="heading">Message:</p>
        <p class="detail">{{{ $enquiry->message }}}</p>
      </div>
    </div>
  </div>
  <hr>
  <div id="reply" class="row">
    <h2>Reply</h2>
    <div class="col-lg-12">
      {{ Form::open(array('url'=>'/admin/enquiries/reply', 'POST', 'class'=>'form-horizontal')) }}
      <div class="form-group">
        {{ Form::text('email', e($enquiry->email), array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
      </div>
      <div class="form-group">
        {{ Form::text('subject', null, array('class'=>'form-control', 'placeholder'=>'Email Subject')) }}
      </div>
      <div class='form-group'>
        {{ Form::textarea('message', null, array('id'=>'editor', 'class'=>'form-control', 'placeholder'=>'Email Message')) }}
      </div>
      <div class="form-group">
        {{ Form::submit('Send', array('class'=>'btn btn-default')) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
@stop
