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
      <form method="post" action="/enquiries" class="form-horizontal" role="form" id="contact-form">
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="tel" class="form-control" name="phone" placeholder="Phone" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" placeholder="Message"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default" id="submit">
            Send
            <i id="spinner" class="fa fa-spinner fa-spin hidden"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
