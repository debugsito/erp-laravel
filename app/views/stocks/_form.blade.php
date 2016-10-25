<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          {{ Form::label ('item_id', 'Material') }}
        {{ Form::select('item_id', $items, $stock->id, array('class' => 'form-control'));}}
      </div>

      <div class="form-group">
          {{ Form::label ('location_id', 'Location') }}
        {{ Form::select('location_id', array('' => '--- Select ---') + $locations, $stock->location_id, array('class' => 'form-control')); }}
      </div>

      <div class="form-group">
          {{ Form::label ('stock_type_id', 'Stock type') }}
          {{ Form::select('stock_type_id', array('' => '--- Select ---') + $stock_types, null, array('class' => 'form-control')); }}
      </div>

      <div class="form-group">
        {{ Form::label ('movement_type_id', 'Movement type') }}
        {{ Form::select('movement_type_id', array('' => '--- Select ---') + $movements, null, array('class' => 'form-control')); }}

      </div>

      <div class="form-group">
          {{ Form::label ('quantity', 'Quantity') }}
        {{ Form::text ('quantity', null, array('class' => 'form-control')) }}
      </div>
  </div>

  <div class="col-md-6">
          
    <div class="form-group">
      {{ Form::label ('material_document_no', 'Material document no') }}
      {{ Form::text ('material_document_no', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">

        {{ Form::label ('order_category_id', 'Order category') }}
        {{ Form::select('order_category_id', array('' => '--- Select ---') + $order_categories, null, array('class' => 'form-control')); }}

    </div>

    <div class="form-group">
        {{ Form::label ('order_data', 'Order data') }}
      {{ Form::text ('order_data', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label ('remark', 'Remark') }}
      {{ Form::textarea ('remark', null, array('class' => 'form-control')) }}
    </div>
  </div>


</div>

