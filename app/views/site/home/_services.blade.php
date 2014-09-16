<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="section-heading">Services</h1>
      <div class="row">
        {{ View::renderEach('site.services._panel', $services, 'service') }}
      </div>
    </div>
  </div>
</div>

