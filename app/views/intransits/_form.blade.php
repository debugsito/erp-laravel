<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label ('no_purchase', 'No Purchase') }}
      {{ Form::text ('no_purchase', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label ('vendor_id', 'Vendor') }}
      {{ Form::select ('vendor_id', $vendors, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label ('order_date', 'Order date') }}
      {{ Form::text ('order_date',null, array('class' => 'form-control datetimepicker', 'yyyy/mm/dd')) }}
    </div>
  </div>
    <div class="col-md-6">
      <div class="form-group">
        {{ Form::label ('item_id', 'Material') }}
        {{ Form::select ('item_id', $items, null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label ('order_qty', 'Order quantity') }}
        {{ Form::text ('order_qty',null, array('class' => 'form-control')) }}
      </div>
      
      <div class="form-group">
        {{ Form::label ('delivery_date', 'Delivery date') }}
        {{ Form::text ('delivery_date',null, array('class' => 'form-control datetimepicker', 'yyyy/mm/dd')) }}
      </div>
  </div>
</div>


