<h2>Unread Enquiries</h2>
@if (count($enquiries))
  <table class="table table-striped">
    <tr>
      <th>Date</th>
      <th>Name</th>
      <th></th>
    </tr>
    @foreach($enquiries as $enquiry)
      <tr @unless($enquiry->viewed) class="info" @endunless>
        <td>{{{ $enquiry->created_at }}}</td>
        <td>{{{ $enquiry->name }}}</td>
        <td>{{ HTML::linkRoute('admin.enquiries.show', 'Show', $enquiry->id, ['class'=>'btn btn-default pull-right']) }}</td>
      </tr>
    @endforeach
  </table>
@else
  <p><em>No unread enquiries.</em></p>
@endif

{{ $enquiries->links() }}
{{ HTML::linkRoute('admin.enquiries.index', 'Go to inbox', null, ['class'=>'btn btn-default pull-right']) }}
