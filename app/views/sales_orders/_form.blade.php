<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		  {{ Form::label ('customer_id', 'Customer') }}
			{{ Form::select('customer_id', $customers, null, array('class' => 'form-control'));}}
		</div>
		<div class="form-group">
		  {{ Form::label ('item_id', 'Material') }}
			{{ Form::select('item_id', $items, null, array('class' => 'form-control'));}}
		</div>
		<div class="form-group">
		  {{ Form::label ('ship_method_id', 'Ship method') }}
			{{ Form::select('ship_method_id', $ship_methods, null, array('class' => 'form-control'));}}
		</div>
		<div class="form-group">
		  {{ Form::label ('po_id', 'PO number') }}
			{{ Form::select('po_id', $po_numbers, null, array('class' => 'form-control'));}}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		  	{{ Form::label ('quantity', 'Quantity') }}
			{{ Form::text ('quantity', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('ship_date', 'Ship date') }}
			{{ Form::text ('ship_date', null, array('class' => 'form-control datetimepicker')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('delivery_date', 'Delivery date') }}
			{{ Form::text ('delivery_date', null, array('class' => 'form-control datetimepicker')) }}
		</div>

	</div>
</div>






