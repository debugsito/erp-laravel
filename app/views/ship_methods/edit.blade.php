{{ Form::model($method, array('method' => 'PUT' ,'route' => array('ship_methods.update', $method->id), 'id' => 'form-ship-methods')) }}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Edit ship method</h4>
</div>

<div class="modal-body">
	@include('ship_methods._form')
</div>
<div class="modal-footer">
  	{{ Form::submit('Save', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}