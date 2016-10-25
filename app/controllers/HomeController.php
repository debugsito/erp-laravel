<?php

class HomeController extends BaseController {

	public function index()
	{

		$last_sales_orders = SalesOrder::take('10')->orderBy('id', 'DESC')->get();

		$last_plan_production = Plan::take('10')->orderBy('id', 'DESC')->get();

		$last_customers = Customer::take('12')->orderBy('id', 'DESC')->get();
            
        return View::make('home.index', compact('last_sales_orders', 'last_plan_production', 'last_customers'));
		
	}

}
