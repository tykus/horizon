@extends('layouts.admin')

@section('content')

	<h2 class="page-heading">Frequently Asked Questions</h2>

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
					    <li>{{ HTML::linkRoute('admin.faqs.destroy', 'Delete', ['id'=>$faq->id], ['data-method'=>'delete']) }}</li>
					  </ul>
					</div>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>


	<div class="col-lg-12">
		{{ $faqs->links() }}
	</div>

	<div class="col-lg-12">
		{{ HTML::linkRoute('admin.faqs.create', 'New FAQ', null, ['class'=>'btn btn-default']) }}
	</div>
@stop

@section('sidebar')
	<div class="alert alert-info">
		You can change the order that the FAQs will appear on the website by dragging and dropping 
		the questions into the order you want in the table on the right.
	</div>
@stop

@section('scripts')
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
@stop