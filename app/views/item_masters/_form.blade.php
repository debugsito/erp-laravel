<div class="form-group">
  	{{ Form::label ('name', 'Name') }}
	{{ Form::text ('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
  {{ Form::label ('description', 'Description') }}
  {{ Form::textarea ('description',null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
  {{ Form::label ('type_id', 'Type') }}
	{{ Form::select('type_id', $types, $item->type_id, array('class' => 'form-control'));}}
</div>
<div class="form-group">
  {{ Form::label ('unit_item_id', 'Unit') }}
  {{ Form::select('unit_item_id', $units, $item->unit_item_id, array('class' => 'form-control'));}}
</div>
