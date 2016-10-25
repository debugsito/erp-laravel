{{ Form::model($stock, array('method' => 'PUT' ,'route' => array('stock_types.update', $stock->id), 'id' => 'form-stock-type')) }}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Edit stock type</h4>
</div>

<div class="modal-body">
	@include('stock_types._form')
</div>
<div class="modal-footer">
  	{{ Form::submit('Save', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}