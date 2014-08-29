<h2>Access Log</h2>
<p class="text-muted">
  These are your most recent logins, go to the {{ HTML::linkRoute('admin.accesslogs.index', 'Access Log') }} to view all recent logins.
</p>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Date</th>
      <th>IP Address</th>
      <th>City</th>
      <th>Country</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($access_logs as $access_log)
    <tr @unless($access_log->login_success) class="danger" @endunless>
      <td>{{ $access_log->created_at }}</td>
      <td>{{ $access_log->ip }}</td>
      <td>{{ $access_log->city }}</td>
      <td class="f32">
        <i class="flag {{ strtolower($access_log->country_code) }}"></i>
        {{ $access_log->country_code }}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

