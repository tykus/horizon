@extends('layouts.admin')

@section('content')
  <h1 class="page-heading">Errors Log</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>URL</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($errors as $error)
      <tr>
        <td>{{ $error->created_at }}</td>
        <td>{{ $error->url }}</td>
        <td>{{ Str::limit($error->description, 120) }}</td>
        <td>{{ HTML::linkRoute('admin.errors.show', 'Show', $error->id, ['class'=>'btn btn-default'] ) }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $errors->links() }}
@stop
