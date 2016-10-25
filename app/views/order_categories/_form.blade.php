<div class="form-group">
  	{{ Form::label ('name', 'Name') }}
	{{ Form::text ('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
  {{ Form::label ('description', 'Description') }}
  {{ Form::textarea ('description',null, array('class' => 'form-control')) }}
</div>