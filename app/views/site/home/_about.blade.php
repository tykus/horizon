<div class="container">
  <div class="row">
    <div class="col-lg-7 col-sm-6">
      <h1 class="section-heading">About / Bio</h1>
      {{ strip_tags($about->value, "<p><strong><em>") }}
    </div>
    <div class="col-lg-4 col-lg-offset-1 col-sm-6">
      <img class="img-responsive pull-right" src="/img/robertgill.jpg" alt="">
    </div>
  </div>
</div>
