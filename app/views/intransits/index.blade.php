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
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control ')) }} </div>
                <div class="col-md-1"> <label>Vendor</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Material</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-2"> <label>Order date</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Status</label> </div>
                <div class="col-md-3"> {{ Form::text ('order_date',null, array('class' => 'form-control datepicker')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Intransits</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-intransit">New</button>
            <button class="btn btn-danger ">Delete</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-intransit table-striped">
        <thead>
            <tr>
                <th width="20px"></th>
                <th>No-Purchase Order</th>
                <th>Vendor</th>
                <th>Order Date</th>
                <th>Material</th>
                <th>Order Qty</th>
                <th>Receipt Qty</th>
                <th>Delivery Date</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($intransits as $intransit)
            <tr class="row-{{ $intransit->id }} btn-modal-intransit-edit">
                <input type="hidden" value="{{ $intransit->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td> {{ $intransit->no_purchase }} </td>
                <td> {{ ($intransit->vendor) ? $intransit->vendor->name : '---' }} </td>
                <td> {{ $intransit->order_date }} </td>
                <td> {{ ($intransit->material) ? $intransit->material->name : '---' }} </td>
                <td> {{ $intransit->order_qty }} </td>
                <td> {{ ($intransit->receipt_qty) ? $intransit->receipt_qty : '0' }} </td>
                <td> {{ $intransit->delivery_date }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($intransits)) No data were found @endif</div>
</div>

@stop