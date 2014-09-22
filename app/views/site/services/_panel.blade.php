<div class="col-lg-4 service">
  <img class="img-circle" src="{{ $service->image_path }}">
  <h3>{{{ $service->title }}}</h3>
  <p>{{ strip_tags($service->introduction) }}</p>
  <p>
    {{ HTML::linkRoute('service_path', 'More »', $service->slug, ['class'=>'btn btn-default pull-right']) }}
  </p>
</div>
@if ($key == 2)
  </div><div class="row">
@endif
