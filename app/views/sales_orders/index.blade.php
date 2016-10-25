@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-sales-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-sales-order"></div>
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
                <div class="col-md-1"> <label>Customer</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Material</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Quantity</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-2"> <label>Ship date</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-2"> <label>Delivery date</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-2"> <label>PO Number</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Sales orders</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-sales-order">New</button>
            <button class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-sales-order table-striped">
        <thead>
            <tr>
                <th width="20px"><input type="checkbox" name="action" /></th>
                <th>Customer</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Ship date</th>
                <th>Delivery date</th>
                <th>PO Number</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($sales as $sale)
            <tr class="row-{{ $sale->id }} btn-modal-sales-order-edit">
                <input type="hidden" value="{{ $sale->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td>{{ str_limit(($sale->customer) ? $sale->customer->company_name : '---', 20, '...') }}</td>
                <td>{{ str_limit(($sale->material) ? $sale->material->name : '---', 30, '...') }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->ship_date }}</td>
                <td>{{ $sale->delivery_date }}</td>
                <td>{{ ($sale->po) ? $sale->po->no_purchase : '---' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($sales)) No data were found @endif</div>
</div>
<div>
    {{ $sales->links(); }}
</div>
@stop