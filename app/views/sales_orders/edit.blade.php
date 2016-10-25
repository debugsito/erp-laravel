{{ Form::model($sale, array('method' => 'PUT' ,'route' => array('sales_order.update', $sale->id), 'id' => 'form-sales-order')) }}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Edit sales order</h4>
</div>
<div class="modal-body">
	@include('sales_orders._form')
</div>
<div class="modal-footer">
  	{{ Form::submit('Save', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}