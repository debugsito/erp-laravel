@extends('layouts.dashboard')
@section('content')
<h1>
    Summary
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Today</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <b class="title-total">1,500, 000</b>
                        <div>
                            <small>
                                In-transit
                            </small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <b class="title-total">1,300, 000</b>
                        <div>
                            <small>
                            Sales entry
                            </small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <b class="title-total">500, 000</b>
                        <div>
                            <small>
                            Delivery Plan
                            </small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <b class="title-total">500, 000</b>
                        <div>
                            <small>
                            PO Entry
                            </small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <b class="title-total">500, 000</b>
                        <div>
                            <small>
                            Stock
                            </small>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <b class="title-total">80</b>
                        <div>
                            <small>
                            Production Plan
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Last Sales order
            <a class="pull-right" href="#">See all</a>
            </div>
            <div class="panel-body padding-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Ship date</th>
                                <th>Delivery date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($last_sales_orders as $sales)
                            <tr>
                                <td>{{ ($sales->customer) ? $sales->customer->company_name : '---' }}</td>
                                <td>{{ ($sales->material) ? $sales->material->name : '---' }}</td>
                                <td>{{ $sales->quantity }}</td>
                                <td>{{ $sales->ship_date }}</td>
                                <td>{{ $sales->delivery_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Last Plan production
            <a class="pull-right" href="#">See all</a></div>
            <div class="panel-body padding-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Material</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($last_plan_production as $plan)
                            <tr>
                                <td>{{ ($plan->line) ? $plan->line->name : '---' }}</td>
                                <td>{{ ($plan->item) ? $plan->item->name : '---' }}</td>
                                <td>{{ $plan->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Last Customers
                <a class="pull-right" href="#">See all</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    @foreach($last_customers as $customer)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <h3>
                                <a href="#">
                                {{ $customer->company_name }}
                                </a>
                            </h3>
                            <div>
                                <b>Client name: </b> 
                            </div>
                            <div>
                                {{ str_limit($customer->client_first_name, 15, ', ') }}
                                {{ str_limit($customer->client_last_name, 15, '...') }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <h2>The purpose of this section is to show a summary of all information ERP System.</h2>
<h4>Check another modules :)</h4> -->
<!-- <div class="row">
    <div class="col-md-6">
        <h2 class="sub-header">Section title</h2>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <button class="btn btn-success glyphicon glyphicon-plus-sign"></button>
            <button class="btn btn-danger glyphicon glyphicon glyphicon glyphicon-trash"></button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="20px"></th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input type="checkbox" name="action" /> </td>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="action" /> </td>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="action" /> </td>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="action" /> </td>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
        </tbody>
    </table>
</div>
 -->
@stop