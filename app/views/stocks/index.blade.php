@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-stock"></div>
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
                <div class="col-md-1"> <label>Material</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-2"> <label>Stock type</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-2"> <label>Entry date</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-1"> <label>Location</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-2"> <label>Movement type</label> </div>
                <div class="col-md-2"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Stock in out</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-stock">New</button>
            <button class="btn btn-danger ">Delete</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-stock table-striped">
        <thead>
            <tr>
                <th width="20px"></th>
                <th>Material</th>
                <th>Entry Date</th>
                <th>Location</th>
                <th>Stock Type</th>
                <th>Movement Type</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($stocks as $stock)
            <tr class="row-{{ $stock->id }} btn-modal-stock-edit">
            <input type="hidden" value="{{ $stock->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td> {{ ($stock->material) ? $stock->material->name : '---' }} </td>
                <td> {{ $stock->entry_date }} </td>
                <td> {{ ($stock->location_id) ? $stock->location->description : '---' }} </td>
                <td> {{ ($stock->type) ? $stock->type->name : '---' }} </td>
                <td> {{ ($stock->movement) ? $stock->movement->name : '---' }} </td>
                <td> {{ $stock->quantity }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($stocks)) No data were found @endif</div>
</div>

@stop