<?php
class PlanController extends BaseController {

   public function index() {
      
      $plans = Plan::orderBy('id', 'DESC')->paginate(8);

      return View::make('plans.index', compact('plans'));
   }

   public function create () {

      $plan = new Plan();

      $lines = Line::lists('name', 'id');

      $items = ItemMaster::lists('name', 'id');

      return View::make('plans.create', compact('plan', 'items', 'lines'));
   }

   public function show ($id) {

   }

   public function plan_mold ($mold_id) {

      $models = Model::where('mold_id', $mold_id)->get();

      return $models;
   }

   public function store () {

      if (!Request::ajax()) return Redirect::back();

      $data = Input::all();

      $json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

      try {

         $plan = new Plan();

         $plan->item_master_id = $data['item_master_id'];

         $plan->line_id = $data['line_id'];

         $plan->production_start_date = $data['production_start_date'];

         $plan->production_end_date = $data['production_end_date'];

         $plan->comment = $data['comment'];

         $plan->quantity = $data['quantity'];

         $plan->status_plan_id = $data['status_plan_id'];

         $plan->production_start_time = $data['production_start_time'];

         $plan->production_end_time = $data['production_end_time'];

         $plan->save();

         $json['success'] = true;

         $json['msg'] = 'Plan created!';

         $plan = Plan::with('item', 'line')->find($plan->id);

         $json['data'] = $plan->toArray();

      } catch(Exception $e) {

         $json['success'] = false;

         $json['msg'] = 'Error:'.$e;

         Log::error($e->getMessage());

      }

      return json_encode($json);

   }

   public function edit ($id) {

      $plan = Plan::find($id);

      $lines = Line::lists('name', 'id');

      $items = ItemMaster::lists('name', 'id');

      return View::make('plans.edit', compact('plan', 'items', 'lines'));
   }

   public function update ($id) {
      
      if (!Request::ajax()) return Redirect::back();

      $data = Input::all();

      $json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

      try {

         $plan = Plan::find($id);

         $plan->item_master_id = $data['item_master_id'];

         $plan->line_id = $data['line_id'];

         $plan->production_start_date = $data['production_start_date'];

         $plan->production_end_date = $data['production_end_date'];

         $plan->comment = $data['comment'];

         $plan->quantity = $data['quantity'];

         $plan->status_plan_id = $data['status_plan_id'];

         $plan->production_start_time = $data['production_start_time'];

         $plan->production_end_time = $data['production_end_time'];

         $plan->save();

         $json['success'] = true;

         $json['msg'] = 'Plan created!';

         $plan = Plan::with('item', 'line')->find($id);

         $json['data'] = $plan->toArray();

      } catch(Exception $e) {

         $json['success'] = false;

         $json['msg'] = 'Error:'.$e;

         Log::error($e->getMessage());

      }

      return json_encode($json);
   }

   public function destroy ($id) {

   }

}
?>