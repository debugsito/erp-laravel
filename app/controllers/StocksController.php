<?php

class StocksController extends \BaseController {

	
	#protected $stock_types = array('Unrestricted' => 'Unrestricted', 'Inspection' => 'Inspection', 'Returned' => 'Returned', 'Blocked' => 'Blocked');

	/**
	 * Display a listing of the resource.
	 * GET /stocks
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = Stock::orderBy('id', 'DESC')->get();
		return View::make('stocks.index', compact('stocks'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /stocks/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$stock = new Stock;

		$movements = MovementType::lists('name', 'id');

		$order_categories = OrderCategory::lists('name', 'id');

		$stock_types = StockType::lists('name', 'id');

		$locations = Location::lists('name', 'id');
		
		$items = ItemMaster::lists('name', 'id');

		return View::make('stocks.create', compact('stock', 'items', 'locations', 'stock_types', 'movements', 'order_categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /stocks
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$stock = new Stock;

			$stock->item_id 		= $data['item_id'];

			$stock->entry_date 		= date('Y-m-d');

			$stock->location_id 	= $data['location_id'];

			$stock->stock_type_id 		= $data['stock_type_id'];

			$stock->movement_type_id 	= $data['movement_type_id'];

			$stock->quantity 		= $data['quantity'];

			$stock->material_document_no = $data['material_document_no'];

			$stock->order_category_id = $data['order_category_id'];

			$stock->order_data = $data['order_data'];

			$stock->remark = $data['remark'];

			$stock->entry_user_id = 1;

			$stock->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$stock = Stock::with('material', 'location', 'movement', 'type')->find($stock->id);

			$json['data'] = $stock->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /stocks/{id}
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
	 * GET /stocks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stock = Stock::find($id);

		$stock_types = StockType::lists('name', 'id');

		$locations = Location::lists('name', 'id');

		$items = ItemMaster::lists('name', 'id');

		$movements = MovementType::lists('name', 'id');

		$order_categories = OrderCategory::lists('name', 'id');

		return View::make('stocks.edit', compact('stock', 'items', 'locations', 'stock_types', 'movements', 'order_categories'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /stocks/{id}
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

			$stock = Stock::find($id);

			$stock->item_id 		= $data['item_id'];

			$stock->entry_date 		= date('Y-m-d');

			$stock->location_id 	= $data['location_id'];

			$stock->stock_type_id 		= $data['stock_type_id'];

			$stock->movement_type_id 	= $data['movement_type_id'];

			$stock->quantity 		= $data['quantity'];

			$stock->material_document_no = $data['material_document_no'];

			$stock->order_category_id = $data['order_category_id'];

			$stock->order_data = $data['order_data'];

			$stock->remark = $data['remark'];

			$stock->entry_user_id = 1;

			$stock->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$stock = Stock::with('material', 'location', 'movement', 'type')->find($stock->id);

			$json['data'] = $stock->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /stocks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}