<?php

class StockTypesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /stocktypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = StockType::orderBy('id', 'DESC')->paginate(8);
		return View::make('stock_types.index', compact('stocks'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /stocktypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$stock = new StockType;
		return View::make('stock_types.create', compact('stock'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /stocktypes
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$stock = new StockType;

			$stock->name 			= $data['name'];

			$stock->description 	= $data['description'];

			$stock->save();

			$json['success'] = true;

			$json['msg'] = 'Stock type created!';

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
	 * GET /stocktypes/{id}
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
	 * GET /stocktypes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stock = StockType::find($id);
		return View::make('stock_types.edit', compact('stock'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /stocktypes/{id}
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

			$stock = StockType::find($id);

			$stock->name 			= $data['name'];

			$stock->description 	= $data['description'];

			$stock->save();

			$json['success'] = true;

			$json['msg'] = 'Stock type updated!';

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
	 * DELETE /stocktypes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}