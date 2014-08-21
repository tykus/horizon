@extends('layouts.admin')

@section('content')
<div id="articles" class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Articles</h1>
    @if (count($articles))
      <table class="table table-striped">
        <tr>
          <th></th>
          <th>Date Published</th>
          <th>Title</th>
          <th>URL</th>
          <th>Tags</th>
          <th></th>
        </tr>
        <tbody id="articles">
        @foreach($articles as $article)
          <tr @unless($article->published()) class="info" @endunless>
            <td><input type="checkbox" name="article[]" data-id="{{ $article->id }}"></td>
            <td class="published_date">{{ $article->published_date }}</td>
            <td>{{{ $article->title }}}</td>
            <td>{{ $article->publicLink() }}</td>
            <td><em>tags</em></td>
            <td>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Actions
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li>{{ HTML::linkRoute('admin.articles.show', 'Show', ['id'=>$article->id]) }}</li>
                <li>{{ HTML::linkRoute('admin.articles.edit', 'Edit', ['id'=>$article->id]) }}</li>
              </ul>
            </div>
            </td>
          </tr>
        @endforeach
        </tbody>
        <tr>
          <td>
            <label>
              <input type="checkbox" id="select-all"> Select All
            </label>
          </td>
          <td colspan="6">
            <button id="publish-selected-button" class="btn btn-xs btn-default">Publish selected</button>
            <button id="unpublish-selected-button" class="btn btn-xs btn-default">Unpublish selected</button>
            <button id="delete-button" class="btn btn-xs btn-danger">Delete selected</button>
          </td>
        </tr>
      </table>

    @else
      <p>No articles to display.</p>
    @endif
  </div>
  <div class="col-lg-12">
    {{ HTML::linkRoute('admin.articles.create', 'New Article', null, ['class' => 'btn btn-info']) }}
  </div>
</div>

@stop
