@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-intransit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-intransit"></div>
  </div>
</div>
<!-- FILTER BY -->
<div>
    <h4>
        <a class="color-blue" type="button" data-toggle="collapse" data-target="#collapseContentSearch" aria-expanded="false" aria-controls="collapseContentSearch">
            <u> Filter by <i class="ion-chevron-down"></i></u>
        </a>
    </h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default collapse" id="collapseContentSearch">
          <div class="panel-body">
            <div class="row">
                <div class="col-md-2"> <label>No-Purchase Order</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Vendor</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Material</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-2"> <label>Order quantity</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">PO Entry</h2>
    </div>
    <div class="col-md-6">
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-op-entry table-striped">
        <thead>
            <tr>
                <!--<th width="20px"></th>-->
                <th>No-Purchase Order</th>
                <th>Vendor</th>
                <th>Order Date</th>
                <th>Material</th>
                <th>Order Qty</th>
                <th>Receipt Qty</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($op_entries as $op_entry)
            <tr class="row-{{ $op_entry->id }}">
                <td> {{ $op_entry->no_purchase }} </td>
                <td> {{ $op_entry->vendor->name }} </td>
                <td> {{ $op_entry->order_date }} </td>
                <td> {{ $op_entry->material->name }} </td>
                <td> {{ $op_entry->order_qty }} </td>
                <td> {{ Form::text('receipt_qty', $op_entry->receipt_qty, array('class' => 'receipt_qty form-control', 'style' => 'width:100px')) }} </td>
                <td> {{ $op_entry->delivery_date }} </td>
                <td> {{ $op_entry->status_id }} </td>
                <td><button class="btn btn-primary btn-save-po-entry" value="{{ $op_entry->id }}">Save</button></td>
                <td><button class="btn btn-primary btn-confirm-po-entry" value="{{ $op_entry->id }}">Confirm</button></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($op_entries)) No data were found @endif</div>
</div>

@stop