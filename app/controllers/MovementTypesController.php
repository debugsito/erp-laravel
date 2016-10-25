<?php

class MovementTypesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /movementtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$movements = MovementType::orderBy('id', 'DESC')->paginate(8);
		return View::make('movement_types.index', compact('movements'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /movementtypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$movement = new MovementType;
		return View::make('movement_types.create', compact('movement'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /movementtypes
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$movement = new MovementType;

			$movement->name 			= $data['name'];

			$movement->description 		= $data['description'];

			$movement->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $movement->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /movementtypes/{id}
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
	 * GET /movementtypes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$movement = MovementType::find($id);
		return View::make('movement_types.edit', compact('movement'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /movementtypes/{id}
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

			$movement = MovementType::find($id);

			$movement->name 			= $data['name'];

			$movement->description 		= $data['description'];

			$movement->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $movement->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /movementtypes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}