<?php

class IntransitsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /intransits
	 *
	 * @return Response
	 */
	public function index()
	{
		$intransits = Intransit::orderBy('id', 'DESC')->get();
		return View::make('intransits.index', compact('intransits'));
	}

	public function po_entry() {
		$op_entries = Intransit::orderBy('id', 'DESC')->whereNull('confirm')->get();
		return View::make('po.index_po_entry', compact('op_entries'));
	}

	public function po_entry_update () {

		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$intransit = Intransit::find($data['intransit_id']);

			$intransit->receipt_qty = $data['receipt_qty'];

			$intransit->save();

			$json['msg'] = 'Saved quantity';
			
			$json['success'] = true;
			
		} catch (Exception $e) {
			
			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);

	}

	public function po_entry_confirm () {

		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$intransit = Intransit::find($data['intransit_id']);

			$intransit->confirm = 1;

			$intransit->save();

			$json['msg'] = 'Confirmed';
			
			$json['success'] = true;

			$stock = new Stock;

			$stock->item_id = $intransit->item_id;

			$stock->entry_date = date('Y-m-d');

			$stock->quantity = $data['receipt_qty'];

			$stock->entry_user_id = 1;

			$stock->save();
			
		} catch (Exception $e) {
			
			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /intransits/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$vendors = Vendor::lists('name', 'id');
		$items = ItemMaster::lists('name', 'id');
		$intransit = new Intransit;
		return View::make('intransits.create', compact('intransit', 'items', 'vendors'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /intransits
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$intransit = new Intransit;

			$intransit->no_purchase 	= $data['no_purchase'];

			$intransit->vendor_id 		= $data['vendor_id'];

			$intransit->order_date 		= $data['order_date'];

			$intransit->item_id 		= $data['item_id'];

			$intransit->order_qty 		= $data['order_qty'];

			$intransit->delivery_date 	= $data['delivery_date'];

			$intransit->user_id = 1;

			$intransit->status_id = 1;

			$intransit->confirm = null;

			$intransit->save();

			$intransit =  Intransit::with('material', 'vendor')->find($intransit->id);

			$json['success'] = true;

			$json['msg'] = 'Intransit created!';

			$json['data'] = $intransit->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /intransits/{id}
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
	 * GET /intransits/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vendors = Vendor::lists('name', 'id');
		$items = ItemMaster::lists('name', 'id');
		$intransit = Intransit::find($id);
		return View::make('intransits.edit', compact('intransit', 'items', 'vendors'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /intransits/{id}
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

			$intransit = Intransit::find($id);

			$intransit->no_purchase 	= $data['no_purchase'];

			$intransit->vendor_id 		= $data['vendor_id'];

			$intransit->order_date 		= $data['order_date'];

			$intransit->item_id 		= $data['item_id'];

			$intransit->order_qty 		= $data['order_qty'];

			/*$intransit->receipt_qty 	= $data['receipt_qty'];*/

			$intransit->delivery_date 	= $data['delivery_date'];

			$intransit->user_id = 1;

			$intransit->status_id = 1;

			$intransit->save();

			$json['success'] = true;

			$json['msg'] = 'Intransit updated!';

			$intransit =  Intransit::with('material', 'vendor')->find($intransit->id);

			$json['data'] = $intransit->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /intransits/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}