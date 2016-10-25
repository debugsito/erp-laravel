<?php

class ItemTypesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /itemtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = ItemType::orderBy('id', 'DESC')->paginate(8);
		return View::make('item_types.index', compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /itemtypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$type = new ItemType;

		return View::make('item_types.create', compact('type'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /itemtypes
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$type = new ItemType;

			$type->name 			= $data['name'];

			$type->description 		= $data['description'];

			$type->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $type->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /itemtypes/{id}
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
	 * GET /itemtypes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$type = ItemType::find($id);
		return View::make('item_types.edit', compact('type'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /itemtypes/{id}
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

			$type = ItemType::find($id);

			$type->name 			= $data['name'];

			$type->description 		= $data['description'];

			$type->save();

			$json['success'] = true;

			$json['msg'] = 'Item type updated!';

			$json['data'] = $type->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /itemtypes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}