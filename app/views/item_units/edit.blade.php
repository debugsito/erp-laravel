{{ Form::model($unit, array('method' => 'PUT' ,'route' => array('item_units.update', $unit->id), 'id' => 'form-item-unit')) }}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Edit item unit</h4>
</div>

<div class="modal-body">
	@include('item_units._form')
</div>
<div class="modal-footer">
  	{{ Form::submit('Save', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}