@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-bom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-bom"></div>
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
                <div class="col-md-1"> <label>Unit</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
                <div class="col-md-1"> <label>Status</label> </div>
                <div class="col-md-3"> {{ Form::text('vendor', null, array('class' => 'form-control')) }} </div>
            </div>
          </div>
          <div class="panel-footer"><button align="right" class="btn btn-primary bg-blue">Search</button></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Bom</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
			<button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-bom">New</button>
            <button class="btn btn-danger ">Delete</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-bom table-striped">
        <thead>
            <tr>
                <th width="20px"></th>
                <th>Item</th>
                <th>Description</th>
                <th>Status</th>
                <th>Users</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($boms as $bom)
            <tr class="row-{{ $bom->id }} btn-modal-bom-edit">
                <input  type="hidden" value="{{ $bom->id }}" />
                <td><input type="checkbox" name="action" /> </td>
                <td>{{ ($bom->parent) ? $bom->parent->name : '---' }}</td>
                <td>{{ ($bom->parent) ? str_limit($bom->parent->description, 30, '...') : '---' }}</td>
                <td>{{ $bom->status }} </td>
                <td>{{ ($bom->user) ? $bom->user->name : '---' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($boms)) No data were found @endif</div>
</div>

@stop