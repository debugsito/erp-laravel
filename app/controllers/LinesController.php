<?php
class LinesController extends BaseController {

   
   public function index() {
      
      $lines = Line::orderBy('id', 'DESC')->paginate(12);

      return View::make('lines.index', compact('lines'));
   }

   public function show($id) {
      
   }

   public function create() {

      $line = new Line;

      return View::make('lines.create', compact('line'));

   }

   public function store() {

      if (!Request::ajax()) return Redirect::back();

      $data = Input::all();

      $json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

      try {

         $line = new Line;

         $line->name          = $data['name'];

         $line->description      = $data['description'];

         $line->save();

         $json['success'] = true;

         $json['msg'] = 'Line created!';

         $json['data'] = $line->toArray();

      } catch(Exception $e) {

         $json['success'] = false;

         $json['msg'] = 'Error:'.$e;

         Log::error($e->getMessage());

      }

      return json_encode($json);
      
   }

   public function edit($id) {

      $line = Line::find($id);

      return View::make('lines.edit', compact('line'));

   }

   public function update($id) {

      if (!Request::ajax()) return Redirect::back();

      $data = Input::all();

      $json = array('success' => false, 'redirect' => null, 'msg' => null, 'data' => null);

      try {

         $line = Line::find($id);

         $line->name          = $data['name'];

         $line->description      = $data['description'];

         $line->save();

         $json['success'] = true;

         $json['msg'] = 'Line created!';

         $json['data'] = $line->toArray();

      } catch(Exception $e) {

         $json['success'] = false;

         $json['msg'] = 'Error:'.$e;

         Log::error($e->getMessage());

      }

      return json_encode($json);

   }
   
   public function destroy($id) {
      
   }

}
?>