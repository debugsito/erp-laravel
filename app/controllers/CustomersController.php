<?php

class CustomersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::orderBy('id', 'DESC')->paginate(8);
		return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$customer = new Customer;
		return View::make('customers.create', compact('customer'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customers
	 *
	 * @return Response
	 */
	public function store()
	{
		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			$customer = new Customer;

			$customer->client_first_name 			= $data['client_first_name'];

			$customer->client_last_name 		= $data['client_last_name'];

			$customer->address_stree_1 			= $data['address_stree_1'];

			$customer->address_stree_2 		= $data['address_stree_2'];

			$customer->phone_number 			= $data['phone_number'];

			$customer->details_note 		= $data['details_note'];

			$customer->company_name 			= $data['company_name'];

			$customer->cell_phone 		= $data['cell_phone'];

			$customer->email 			= $data['email'];

			$customer->city 		= $data['city'];

			$customer->zipcode 		= $data['zipcode'];

			$customer->save();

			$json['success'] = true;

			$json['msg'] = 'Customer created!';

			$json['data'] = $customer->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /customers/{id}
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
	 * GET /customers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::find($id);
		return View::make('customers.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customers/{id}
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

			$customer = Customer::find($id);

			$customer->client_first_name 			= $data['client_first_name'];

			$customer->client_last_name 		= $data['client_last_name'];

			$customer->address_stree_1 			= $data['address_stree_1'];

			$customer->address_stree_2 		= $data['address_stree_2'];

			$customer->phone_number 			= $data['phone_number'];

			$customer->details_note 		= $data['details_note'];

			$customer->company_name 			= $data['company_name'];

			$customer->cell_phone 		= $data['cell_phone'];

			$customer->email 			= $data['email'];

			$customer->city 		= $data['city'];

			$customer->zipcode 		= $data['zipcode'];

			$customer->save();

			$json['success'] = true;

			$json['msg'] = 'Customer created!';

			$json['data'] = $customer->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}