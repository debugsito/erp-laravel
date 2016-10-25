<div class="row">
  <div class="col-md-6">
      <div class="form-group">
        {{ Form::label ('line_id', 'Line') }}
        {{ Form::select('line_id', array('0'=> '-- Seleccionar --') + $lines, array('selected' => $plan->line_id),  array('id' => 'line_id', 'class' => 'form-control'))}}
      </div>

      <div class="form-group">
        {{ Form::label ('item_master_id', 'Items') }}
        {{ Form::select('item_master_id', $items, array('selected' => $plan->item_master_id),  array('id' => '', 'class' => 'form-control'))}}
      </div>
       
      <div class="form-group">
        {{ Form::label ('production_start_date', 'Production start date') }}
        {{ Form::text('production_start_date', null, array('class' => 'form-control datetimepicker', 'placeholder' => 'yyyy/mm/dd')) }}
      </div>
      <div>
        {{ Form::label ('production_end_date', 'Production end date') }}
        {{ Form::text('production_end_date', null, array('class' => 'form-control datetimepicker', 'placeholder' => 'yyyy/mm/dd')) }}
      </div>

      <div class="form-group">
        {{ Form::label ('production_start_time', 'Production start time') }}
        {{ Form::text('production_start_time', null, array('id'=>'', 'class' => 'form-control datetimepickertime', 'placeholder' => '10:50')) }}
      </div>
       <div class="form-group">
      {{ Form::label ('production_end_time', 'Production end time') }}
      {{ Form::text('production_end_time', null, array('id'=>'', 'class' => 'form-control datetimepickertime', 'placeholder' => '10:50')) }}
    </div>
    
  </div>
  <div class="col-md-6">
   
    <div class="form-group">
      {{ Form::label ('quantity', 'Quantity') }}
      {{ Form::text('quantity', null, array('id'=>'quantity', 'class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label ('comment', 'Comment') }}
      {{ Form::textarea('comment', null, array('id'=>'comment', 'class' => 'form-control')) }}
    </div>
          
    <div class="form-group">
      <div>
        <label>Status: </label>
      </div>
      {{ Form::label('status_plan_id', 'Si') }}
      {{ Form::radio('status_plan_id', '1', ($plan->status_plan == '1' or is_null($plan->id)) ? true : false, array('id'=> 'rb_status_plan')) }}

      {{ Form::label('status_plan_id', 'No')}}
      {{ Form::radio('status_plan_id', '2', ($plan->status_plan == '2') ? true : false, array('id'=>'rb_status_plan'))}}
    </div>
  </div>
</div>

