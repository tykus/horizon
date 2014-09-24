<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Contact</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <p class="lead">
        <span class="highlight">{{ Config::get('site.business.name') }}</span class="highlight">
        <br>
        {{ Config::get('site.business.address') }}
      </p>
      <p class="lead">
        <i class="fa fa-envelope"></i>
        {{ HTML::mailto(HTML::email(Config::get('site.business.email')), Config::get('site.business.email')) }}
        <br>
        <i class="fa fa-phone"></i>
        {{ Config::get('site.business.mobile') }}
        <br>
        <i class="fa fa-globe"></i>
        {{ HTML::link(Config::get('site.business.url'), Config::get('site.business.url')) }}
      </p>
    </div>

    <div class="col-sm-6 col-sm-offset-3">
      {{ Form::open(['route'=>'enquiry_path', 'action'=>'POST', 'class'=>'form-horizontal', 'id'=>'contact-form']) }}
        {{ Form::text('captcha', null, ['id'=>'captcha']) }}
        <div class="form-group">
          {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'required'=>'']) }}
        </div>
        <div class="form-group">
          {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required'=>'']) }}
        </div>
        <div class="form-group">
          {{ Form::text('telephone', null, ['class'=>'form-control', 'placeholder'=>'Phone', 'required'=>'']) }}
        </div>
        <div class="form-group">
          {{ Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Message Body']) }}
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default" id="submit">
            Send
          </button>
          <div id="alert" class="alert pull-right" style="display:none">
            <span id="message"></span>
            <i id="spinner" class="fa fa-spinner fa-spin hidden"></i>
          </div>
        </div>
      {{ Form::close() }}
    </div>

  </div>
</div>
