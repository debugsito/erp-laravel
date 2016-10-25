@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-vendors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-vendors"></div>
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
                <div class="col-md-2"> <label>Created date</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Vendors</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-vendors">Add</button>
            <button class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-vendors table-striped">
        <thead>
            <tr>
                <th width="20px"></th>
                <th>Name</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($vendors as $vendor)
            <tr class="row-{{ $vendor->id }} btn-modal-vendors-edit"> <input type="hidden" value="{{ $vendor ->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td>{{ str_limit($vendor->name, 30, '...') }}</td>
                <td>{{ $vendor->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($vendors)) No data were found @endif</div>
</div>
<div>
    {{ $vendors->links(); }}
</div>
@stop