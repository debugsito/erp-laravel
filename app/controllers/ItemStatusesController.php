<?php

class ItemStatusesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /itemstatuses
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = ItemStatus::orderBy('id', 'DESC')->paginate(8);
		return View::make('item_statuses.index', compact('statuses'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /itemstatuses/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$status = new ItemStatus;
		return View::make('item_statuses.create', compact('status'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /itemstatuses
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$status = new ItemStatus;

			$status->name 			= $data['name'];

			$status->description 		= $data['description'];

			$status->save();

			$json['success'] = true;

			$json['msg'] = 'Status created!';

			$json['data'] = $status->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /itemstatuses/{id}
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
	 * GET /itemstatuses/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status = ItemStatus::find($id);
		return View::make('item_statuses.edit', compact('status'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /itemstatuses/{id}
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

			$status = ItemStatus::find($id);

			$status->name 			= $data['name'];

			$status->description 		= $data['description'];

			$status->save();

			$json['success'] = true;

			$json['msg'] = 'Status created!';

			$json['data'] = $status->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /itemstatuses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}