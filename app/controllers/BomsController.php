<?php

class BomsController extends \BaseController {

	//BOM Type { 1:finished material, 2, raw material }

	/**
	 * Display a listing of the resource.
	 * GET /boms
	 *
	 * @return Response
	 */
	public function index()
	{
		$boms = Bom::orderBy('id', 'DESC')->where('type', 1)->get();
		return View::make('boms.index', compact('boms'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /boms/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$bom = new Bom;
		$items = ItemMaster::lists('name', 'id');
		return View::make('boms.create', compact('bom', 'items'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /boms
	 *
	 * @return Response
	 */
	public function store() {

		if (!Request::ajax()) return Redirect::back();

		$data = Input::all();

		$json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

		try {

			if (!isset($data['item_id'])) {

				$json['msg']= "You need select material to child material";
				
				$json['success']= false;
				
				return json_encode($json);
			}

			$count = count($data['item_id']);

			//if ($data['item_id_parent']) {

				$bom_parent = new Bom;

				$bom_parent->item_id_parent 	= $data['item_id_parent'];

				$bom_parent->item_id_child 	= null;

				$bom_parent->type = 1;

				$bom_parent->status 			= 1;

				$bom_parent->user_id 			= 1;

				$bom_parent->save();
			//}

			for ($i=0; $i < $count; $i++) { 
				
				$bom = new Bom;

				$bom->item_id_parent 	= $bom_parent->id;

				$bom->item_id_child 	= $data['item_id'][$i];

				$bom->status 			= 1;

				$bom->type 				= 2;

				$bom->user_id 			= 1;

				$bom->save();
				
			}

			$item_parent = Bom::with('parent', 'user')->find($bom_parent->id); 

			$json['success'] = true;

			$json['msg'] = 'BOM created!';

			$json['data'] = $item_parent->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Display the specified resource.
	 * GET /boms/{id}
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
	 * GET /boms/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bom = Bom::find($id);

		$bom_items = null;

		if ($bom) {
			$bom_items = Bom::where('item_id_parent', $bom->id)->whereNotNull('item_id_child')->get();
		}
		
		$items = ItemMaster::lists('name', 'id');

		return View::make('boms.edit', compact('bom', 'items', 'bom_items'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /boms/{id}
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

			if (!isset($data['item_id'])) {

				$json['msg']= "You need select material to child material";
				
				$json['success']= false;
				
				return json_encode($json);
			}

			$count = count($data['item_id']);

			//if ($data['item_id_parent']) {

				$bom_parent = Bom::find($id);

				$bom_parent->item_id_parent 	= $data['item_id_parent'];

				$bom_parent->item_id_child 	= null;

				$bom_parent->type = 1;

				$bom_parent->status 			= 1;

				$bom_parent->user_id 			= 1;

				$bom_parent->save();
			//}

			$items_bom_remove = Bom::where('item_id_parent', $id)->get();

			foreach ($items_bom_remove as $item) {
				
				$item->delete();
			}

			for ($i=0; $i < $count; $i++) {
				
				$bom = new Bom;

				$bom->item_id_parent 	= $bom_parent->id;

				$bom->item_id_child 	= $data['item_id'][$i];

				$bom->status 			= 1;

				$bom->type 				= 2;

				$bom->user_id 			= 1;

				$bom->save();
				
			}

			$item_parent = Bom::with('parent', 'user')->find($bom_parent->id); 

			$json['success'] = true;

			$json['msg'] = 'BOM updated!';

			$json['data'] = $item_parent->toArray();

		} catch(Exception $e) {

			$json['success'] = false;

			$json['msg'] = 'Error:'.$e;

			Log::error($e->getMessage());

		}

		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /boms/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}