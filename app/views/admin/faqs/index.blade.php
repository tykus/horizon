@extends('layouts.admin')

@section('content')

	<h2 class="page-heading">Frequently Asked Questions</h2>

	{{ HTML::linkRoute('admin.faqs.create', 'New FAQ', ['class'=>'btn btn-default']) }}

	<table class="table table-striped" id="faqs">
		<thead>
			<tr>
				<th>Question</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody id="sortable">
		@foreach ($faqs as $faq)
			<tr id="faq-{{ $faq->id }}">
				<td>{{{ $faq->question }}}</td>
				<td>
					<div class="btn-group">
					  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    Actions
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li>{{ HTML::linkRoute('admin.faqs.show', 'Show', ['id'=>$faq->id]) }}</li>
					    <li>{{ HTML::linkRoute('admin.faqs.edit', 'Edit', ['id'=>$faq->id]) }}</li>
					  </ul>
					</div>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop

@section('sidebar')
	<div class="alert alert-info">
		This content is editable in place.
	</div>
@stop

@section('scripts')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop