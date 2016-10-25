<?php

class SalesOrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /salesorders
	 *
	 * @return Response
	 */
	public function index()
	{
		$sales = SalesOrder::orderBy('id', 'DESC')->paginate(8);
		return View::make('sales_orders.index', compact('sales'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /salesorders/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$sale = new SalesOrder;

		$customers = Customer::orderBy('id', 'DESC')->lists('company_name', 'id');

		$items = ItemMaster::orderBy('id', 'DESC')->lists('name', 'id'); //Revizar si se va poner todos los item o solo los productos terminados. BOM

		$ship_methods = ShipMethod::orderBy('id', 'DESC')->lists('name', 'id');

		$po_numbers = Intransit::whereNull('confirm')->lists('no_purchase', 'id'); //los PO sin confirmar son PO ??? revisar esta consulta


		return View::make('sales_orders.create', compact('sale', 'customers', 'items', 'ship_methods', 'po_numbers'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /salesorders
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$sale = new SalesOrder;

			$sale->customer_id 			= $data['customer_id'];

			$sale->item_id 		= $data['item_id'];

			$sale->quantity 		= $data['quantity'];

			$sale->ship_date 		= $data['ship_date'];

			$sale->delivery_date 		= $data['delivery_date'];

			$sale->ship_method_id 		= $data['ship_method_id'];

			$sale->po_id 		= $data['po_id'];

			$sale->save();

			$json['success'] = true;

			$json['msg'] = 'sales order created!';

			$sale = SalesOrder::with('po', 'material', 'customer', 'method')->find($sale->id);

			$json['data'] = $sale->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /salesorders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /salesorders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sale = SalesOrder::find($id);

		$customers = Customer::orderBy('id', 'DESC')->lists('company_name', 'id');

		$items = ItemMaster::orderBy('id', 'DESC')->lists('name', 'id'); //Revizar si se va poner todos los item o solo los productos terminados. BOM

		$ship_methods = ShipMethod::orderBy('id', 'DESC')->lists('name', 'id');

		$po_numbers = Intransit::whereNull('confirm')->lists('no_purchase', 'id'); //los PO sin confirmar son PO ??? revisar esta consulta


		return View::make('sales_orders.edit', compact('sale', 'customers', 'items', 'ship_methods', 'po_numbers'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /salesorders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$sale = SalesOrder::find($id);

			$sale->customer_id 			= $data['customer_id'];

			$sale->item_id 		= $data['item_id'];

			$sale->quantity 		= $data['quantity'];

			$sale->ship_date 		= $data['ship_date'];

			$sale->delivery_date 		= $data['delivery_date'];

			$sale->ship_method_id 		= $data['ship_method_id'];

			$sale->po_id 		= $data['po_id'];

			$sale->save();

			$json['success'] = true;

			$json['msg'] = 'sales order created!';

			$sale = SalesOrder::with('po', 'material', 'customer', 'method')->find($sale->id);

			$json['data'] = $sale->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /salesorders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}