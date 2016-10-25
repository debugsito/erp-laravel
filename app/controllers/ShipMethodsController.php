<?php

class ShipMethodsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /shipmethods
	 *
	 * @return Response
	 */
	public function index()
	{
		$methods = ShipMethod::orderBy('id', 'DESC')->paginate();
		return View::make('ship_methods.index', compact('methods'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /shipmethods/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$method = new ShipMethod;
		return View::make('ship_methods.create', compact('method'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /shipmethods
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$method = new ShipMethod;

			$method->name 			= $data['name'];

			$method->description 		= $data['description'];

			$method->save();

			$json['success'] = true;

			$json['msg'] = 'Ship method created!';

			$json['data'] = $method->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /shipmethods/{id}
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
	 * GET /shipmethods/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$method = ShipMethod::find($id);
		return View::make('ship_methods.edit', compact('method'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /shipmethods/{id}
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

			$method = ShipMethod::find($id);

			$method->name 			= $data['name'];

			$method->description 		= $data['description'];

			$method->save();

			$json['success'] = true;

			$json['msg'] = 'Ship method created!';

			$json['data'] = $method->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /shipmethods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}