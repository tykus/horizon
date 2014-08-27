<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="section-heading">Services</h1>
      @foreach($services as $service)
        <div class="col-lg-4 service">
          <img class="img-circle" src="{{ $service->image_path }}">
          <h3>{{{ $service->title }}}</h3>
          <p>{{{ $service->introduction }}}</p>
          <p><a class="btn btn-default pull-right" href="#" role="button">View details »</a>
          </p>
        </div>
      @endforeach
    </div>
  </div>
</div>
