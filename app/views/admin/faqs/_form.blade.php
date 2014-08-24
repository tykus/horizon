<div class="form-group">
  {{Form::label('question', 'Question', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::text('question', e($faq->question), ['class'=>'form-control']) }}
  </div>
</div>
<div class="form-group">
  {{Form::label('answer', 'Answer', ['class'=>'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::textarea('answer', e($faq->answer), ['class'=>'form-control']) }}
  </div>
</div>