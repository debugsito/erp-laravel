@extends('layouts.dashboard')
@section('content')

<!--MODAL-->
<div class="modal fade" id="modal-plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-content-plan"></div>
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
        <h2 class="sub-header">Plans</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <button type="button" class="btn btn-success" data-toggle="modal" id="btn-modal-plan">New</button>
            <button class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>
<!--TABLE-->
<div class="table-responsive">

    <table class="table table-plan table-striped">
            <thead>
                <tr>
                    <th width="20px"><input type="checkbox" name="action" /></th>
                    <th> Iterm </th>
                    <th> Line </th>
                    <th> F/H inicio</th>
                    <th> F/H finaliza</th>
                    <th> Quantity</th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr class="row-{{ $plan->id }} btn-modal-plan-edit">
                <input type="hidden" value="{{ $plan->id }}" />
                     <td><input type="checkbox" name="action" /> </td>
                    <td>{{ str_limit(($plan->item) ? $plan->item->name : '---', 20, '...') }}</td>
                    <td>{{ str_limit(($plan->line) ? $plan->line->name : '---', 20, '...') }}</td>
                    
                    <td>
                        {{ ($plan->production_start_date) ? $plan->production_start_date : '---' }} 
                        <br /> {{ ($plan->production_start_time) ? $plan->production_start_time : '---' }} 
                    </td>
                    <td>
                        {{ ($plan->production_end_date) ? $plan->production_end_date : '---'  }}
                        <br /> {{ ($plan->production_end_time) ? $plan->production_end_time : '---' }}
                    </td>
                    <td> {{ $plan->quantity }} </td>
                    <td>
                        <span  class="label label-{{ ($plan->status_plan_id == 1) ? 'success' : 'danger' }}" >
                            @if($plan->status_plan_id == 1)
                                Active
                            @elseif($plan->status_plan_id == 2)
                                Inactive
                            @else
                                <i class="text-danger">Erroneo</i>
                            @endif
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    <div class="alert-data-not-found">@if(!count($plans)) No data were found @endif</div>
</div>
<div>
    {{ $plans->links(); }}
</div>
@stop