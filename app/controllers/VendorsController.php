<?php

class VendorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /vendors
	 *
	 * @return Response
	 */
	public function index()
	{
		$vendors = Vendor::orderBy('id', 'DESC')->paginate(10);
		return View::make('vendors.index', compact('vendors'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vendors/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$vendor = new Vendor;
		return View::make('vendors.create', compact('vendor'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vendors
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$vendor = new Vendor;

			$vendor->name 			= $data['name'];

			$vendor->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $vendor->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /vendors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = ItemMaster::find($id);
		return View::make('vendors.edit', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vendors/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vendor = Vendor::find($id);
		return View::make('vendors.edit', compact('vendor'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vendors/{id}
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

			$vendor = Vendor::find($id);

			$vendor->name 			= $data['name'];

			$vendor->save();

			$json['success'] = true;

			$json['msg'] = 'Data updated!';

			$json['data'] = $vendor->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vendors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}