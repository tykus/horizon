@extends('layouts.admin')

@section('content')
  <h1 class="page-header">Enquiry</h1>
  <div id="enquiries" class="row">
    <div class="col-lg-12">
      <h2>Information Received</h2>
      <p>
        <span class="heading col-sm-2">From</span>
        {{{ $enquiry->name }}} &laquo; {{{ $enquiry->email }}} &raquo;
      </p>
      <p>
        <span class="heading col-sm-2">Telephone</span>
        {{{ $enquiry->telephone }}}
      </p>
      <p>
        <span class="heading col-sm-2">Date</span>
        {{ date_format($enquiry->created_at, 'd M Y - H:i:s') }}
      </p>
      <p>
        <span class="heading col-sm-2">Message</span>
        {{{ $enquiry->message }}}
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-2">
      {{ HTML::linkRoute('admin.enquiries.index', 'Back to index', null, ['class'=>'btn btn-default pull-right']) }}
    </div>
  </div>

  <hr>
  <div id="reply" class="row">
    <h3>Reply</h3>
    <p>You can reply directly to the query from here:</p>
    <div class="col-lg-12">
      {{ Form::open(array('url'=>'/admin/enquiries/reply', 'POST', 'class'=>'form-horizontal', 'id'=>"enquiry-reply-form")) }}
      {{ Form::hidden('id', $enquiry->id) }}
      <div class="form-group">
        {{Form::label('email', 'Email', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('email', e($enquiry->email), array('class'=>'form-control', 'disabled'=>'')) }}
        </div>
      </div>
      <div class="form-group">
        {{Form::label('subject', 'Subject', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('subject', null, array('class'=>'form-control', 'placeholder'=>'Thank you for your enquiry.')) }}
        </div>
      </div>
      <div class='form-group'>
        {{Form::label('message', 'Message', array('class'=>'col-sm-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::textarea('message', null, array('id'=>'editor', 'class'=>'form-control')) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
          {{ Form::submit('Send', array('class'=>'btn btn-default')) }}
        </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>
@stop
