@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-stockType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-stockType"></div>
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
                    <div class="col-md-1"> <label>Name</label> </div>
                    <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                    <div class="col-md-1"> <label>Description</label> </div>
                    <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                </div>
            </div>
            <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Stock types</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-stockType">New</button>
            <button class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-stockType table-striped">
        <thead>
            <tr>
                <th width="20px"><input type="checkbox" name="action" /></th>
                <th>Material</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($stocks as $stock)
            <tr class="row-{{ $stock->id }} btn-modal-stockType-edit"> <input type="hidden" value="{{ $stock->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td>{{ str_limit($stock->name, 20, '...') }}</td>
                <td>{{ str_limit($stock->description, 30, '...') }}</td>
                <td>{{ $stock->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($stocks)) No data were found @endif</div>
</div>
<div>
    {{ $stocks->links(); }}
</div>
@stop