<h2 class="page-heading">Site Errors</h2>
<p class="text-muted">
  These are the most recently occurring errors on the site. All previous errors
  can be viewed in the {{ HTML::linkRoute('admin.errors.index', 'Errors Log') }}.
</p>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Date</th>
      <th>URL</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($errors as $error)
    <tr>
      <td>{{ $error->created_at }}</td>
      <td>{{ $error->url }}</td>
      <td>{{ Str::limit($error->description, 50) }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
