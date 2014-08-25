<div class="form-group">
  {{Form::label('name', 'Name', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::text('name', e($user->name), array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('email', 'Email', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::email('email', e($user->email), array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('password', 'Password', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::password('password', array('class'=>'form-control')) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('password_confirmation', 'Confirm Password', array('class'=>'col-sm-2 control-label')) }}
  <div class="col-sm-10">
    {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
  </div>
</div>
