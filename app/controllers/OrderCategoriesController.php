<?php

class OrderCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /ordercategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = OrderCategory::orderBy('id', 'DESC')->paginate(8);
		return View::make('order_categories.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ordercategories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$order = new OrderCategory;
		return View::make('order_categories.create', compact('order'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ordercategories
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$order = new OrderCategory;

			$order->name 			= $data['name'];

			$order->description 	= $data['description'];

			$order->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $order->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /ordercategories/{id}
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
	 * GET /ordercategories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = OrderCategory::find($id);
		return View::make('order_categories.edit', compact('order'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ordercategories/{id}
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

			$order = OrderCategory::find($id);

			$order->name 			= $data['name'];

			$order->description 	= $data['description'];

			$order->save();

			$json['success'] = true;

			$json['msg'] = 'Item created!';

			$json['data'] = $order->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ordercategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}