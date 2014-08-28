@extends('layouts.admin')

@section('content')
  <section id="services">
    <h1 class="page-header">Services</h1>
    @if (count($services))
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Introduction</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="sortable">
        @foreach($services as $service)
          <tr id="service-{{ $service->id }}">
            <td>{{ HTML::image($service->image_path, null, ['class'=>'img-thumbnail', 'width'=>'80', 'height'=>'80']) }}</td>
            <td>{{{ $service->title }}}</td>
            <td>{{{ Str::limit($service->introduction, 40) }}}</td>
            <td>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Actions
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li>{{ HTML::linkRoute('admin.services.show', 'Show', ['id'=>$service->id]) }}</li>
                <li>{{ HTML::linkRoute('admin.services.edit', 'Edit', ['id'=>$service->id]) }}</li>
              </ul>
            </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    @else
      <p>No services to display.</p>
    @endif
  </section>
@stop

@section('scripts')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop
