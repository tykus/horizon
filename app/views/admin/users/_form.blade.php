<div class="form-group">
  {{Form::label('name', 'Name', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::text('name', e($user->name), ['class'=>'form-control']) }}
  </div>
  <div class="col-sm-3">
    <span class="text-success" style="display:none"><i class="fa fa-check-circle"></i></span>
    <span class="text-danger" style="display:none"><i class="fa fa-times-circle"></i> Name is required</span>
  </div>
</div>

<div class="form-group">
  {{Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::email('email', e($user->email), ['class'=>'form-control']) }}
  </div>
  <div class="col-sm-3">
    <span class="text-success" style="display:none"><i class="fa fa-check-circle"></i></span>
    <span class="text-danger" style="display:none"><i class="fa fa-times-circle"></i> A unique, valid email address is required</span>
  </div>
</div>

<div class="form-group">
  {{Form::label('password', 'Password', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::password('password', ['class'=>'form-control']) }}
  </div>
  <div class="col-sm-3">
    <span class="text-success" style="display:none"><i class="fa fa-check-circle"></i></span>
    <span class="text-danger" style="display:none"><i class="fa fa-times-circle"></i> Password must be 6-10 characters in length</span>
  </div>
</div>

<div class="form-group">
  {{Form::label('password-confirmation', 'Confirm Password', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::password('password-confirmation', ['class'=>'form-control']) }}
  </div>
  <div class="col-sm-3">
    <span class="text-success" style="display:none"><i class="fa fa-check-circle"></i></span>
    <span class="text-danger" style="display:none"><i class="fa fa-times-circle"></i> Passwords must match</span>
  </div>
</div>

@if (Auth::user()->isAdmin())
  <div class="form-group">
    {{Form::label('role', 'Role', ['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-7">
      {{ Form::select('role', ['user'=>'user', 'admin'=>'admin'], $user->role, ['class'=>'form-control']) }}
    </div>
    <div class="col-sm-3">
      <span class="text-success" style="display:none"><i class="fa fa-check-circle"></i></span>
      <span class="text-danger" style="display:none"><i class="fa fa-times-circle"></i> Passwords must match</span>
    </div>
  </div>
@endif
