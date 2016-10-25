<?php

class ItemMastersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /itemmasters
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = ItemMaster::orderBy('id', 'DESC')->paginate(10);
		return View::make('item_masters.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /itemmasters/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$item = new ItemMaster;
		$units = ItemUnit::lists('name', 'id');
		$types = ItemType::lists('name', 'id');

		return View::make('item_masters.create', compact('item', 'units', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /itemmasters
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$item = new ItemMaster;

			$item->name 			= $data['name'];

			$item->description 		= $data['description'];

			$item->type_id 			= $data['type_id'];

			$item->unit_item_id 	= $data['unit_item_id'];

			$item->user_id = 1;

			$item->status_id = 1;

			$item->save();

			$item = ItemMaster::with('unit', 'type')->find($item->id);

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $item->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /itemmasters/{id}
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
	 * GET /itemmasters/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = ItemMaster::find($id);
		$units = ItemUnit::lists('name', 'id');
		$types = ItemType::lists('name', 'id');
		return View::make('item_masters.edit', compact('item', 'units', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /itemmasters/{id}
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

			$item = ItemMaster::find($id);

			$item->name 			= $data['name'];

			$item->description 		= $data['description'];

			$item->type_id 			= $data['type_id'];

			$item->unit_item_id 	= $data['unit_item_id'];

			$item->user_id = 1;

			$item->status_id = 1;

			$item->save();

			$item = ItemMaster::with('unit', 'type')->find($item->id);

			$json['success'] = true;

			$json['msg'] = 'Item updated!';

			$json['data'] = $item->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /itemmasters/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function search_item() {

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {
			
			$data = Input::get('item');

			$items = ItemMaster::where('name', 'LIKE', '%' . $data . '%')->where('description', 'LIKE', '%' . $data . '%')->get();

			$json['data'] = $items->toArray();

			$json['success'] = true;

		} catch (Exception $e) {

			$json['success'] = false;

			$json['no se encontro nada'];
			
		}

		return json_encode($json);

	}

}