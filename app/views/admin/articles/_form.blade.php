<div class="form-group">
  {{Form::label('title', 'Title', ['class'=>'col-lg-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::text('title', $article->title, ['class'=>'form-control']) }}
  </div>
</div>

<div class="form-group">
  {{Form::label('slug', 'Public URL', ['class'=>'col-lg-2 control-label']) }}
  <div class="col-sm-10">
    <div class="input-group">
      <div class="input-group-addon">{{ URL::to('/') }}/articles/</div>
      {{ Form::text('slug_disabled', $article->slug, ['class'=>'form-control', 'disabled'=>'']) }}
    </div>
  </div>
</div>

<div class="form-group">
  {{Form::label('content', 'Content', ['class'=>'col-lg-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::textarea('content', $article->content, ['class'=>'form-control']) }}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-0 col-lg-offset-2">
    <label>
      {{ Form::checkbox('publish', 1, ['class'=>'form-control']) }}
      Publish Now
    </label>
  </div>
</div>


