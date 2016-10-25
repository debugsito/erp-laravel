@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-line" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-line"></div>
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
        <h2 class="sub-header">Lines</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-line">New</button>
            <button class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">
    <table class="table table-line table-striped">
        <thead>
            <tr>
                <th width="20px"><input type="checkbox" name="action" /></th>
                <th>Name</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lines as $line)
            <tr class="row-{{ $line->id }} btn-modal-line-edit"> <input type="hidden" value="{{ $line->id }}">
                <td><input type="checkbox" name="action" /> </td>
                <td>{{ str_limit($line->name, 20, '...') }}</td>
                <td>{{ str_limit($line->description, 30, '...') }}</td>
                <td>{{ $line->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert-data-not-found">@if(!count($lines)) No data were found @endif</div>
</div>
<div>
    {{ $lines->links(); }}
</div>
@stop