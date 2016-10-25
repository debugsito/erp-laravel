<hr />
<div class="form-group">
  	{{ Form::label ('item_id_parent', 'Parent material') }}
	{{ Form::select ('item_id_parent', $items, $bom->item_id_parent, array('class' => 'form-control')) }}
</div>
<label>Child material</label>
<div id="content-items-add-bom" class="content-items-add-bom">
@if(isset($bom_items))
	@foreach($bom_items as $item)
		<div class="alert alert-info alert-dismissible fade in" role="alert">
			{{ ($item->child) ? $item->child->name : 'Error' }}<input type="hidden" name="item_id[]" value="{{ $item->item_id_child }}">
			<a type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</a>
		</div>
	@endforeach
@endif
</div>