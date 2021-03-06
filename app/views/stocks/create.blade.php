{{ Form::model($stock, array('route' => 'stocks.store', 'id' => 'form-stock')) }}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Create stock</h4>
</div>
<div class="modal-body">
	@include('stocks._form')
</div>
<div class="modal-footer">
  	{{ Form::submit('Guardar', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}