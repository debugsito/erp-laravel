<?php

class ItemsUnitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /unititems
	 *
	 * @return Response
	 */
	public function index()
	{
		$units = ItemUnit::orderBy('id', 'DESC')->paginate(8);
		return View::make('item_units.index', compact('units'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /unititems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$unit = new ItemUnit;
		return View::make('item_units.create', compact('unit'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /unititems
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$unit = new ItemUnit;

			$unit->name 			= $data['name'];

			$unit->description 		= $data['description'];

			$unit->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $unit->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /unititems/{id}
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
	 * GET /unititems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$unit = ItemUnit::find($id);
		return View::make('item_units.edit', compact('unit'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /unititems/{id}
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

			$unit = ItemUnit::find($id);

			$unit->name 			= $data['name'];

			$unit->description 		= $data['description'];

			$unit->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $unit->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /unititems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}