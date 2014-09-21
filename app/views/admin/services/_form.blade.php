<div class="form-group">
  {{Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::text('title', e($service->title), array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('introduction', 'Introduction', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::textarea('introduction', e($service->introduction), array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::textarea('description', e($service->description), array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('image', 'Image', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::file('image') }}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    {{ Form::submit('Save', array('class'=>'btn btn-default')) }}
  </div>
</div>
