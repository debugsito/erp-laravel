<?php
class UsersController extends BaseController {

   private $autorizado;

   public function __construct(){
      
   }

   public function index () {

      if (Input::get('search')) {
         
         $search = Input::get('search');

         $users = User::where('name', 'LIKE', '%'. $search. '%')->orWhere('email', 'LIKE', '%' .$search. '%')->paginate(5);

         $users->appends(Input::only('search'));

      } else {

         $users = User::paginate(12);
      }


      return View::make('users.index', compact('users'));
   }

   public function show($id) {

   }
   public function create () {

      $user = new User();

      $usertypes = UserType::lists('name', 'id');

      return View::make('users.save', compact('user', 'usertypes'));
   }
   public function store() {

      try {

         $inputs = Input::all();

         $user = new User($inputs);

         $user->save();
         
      } catch (Exception $e) {
         
         return Redirect::back();
      }

      return Redirect::to('users')->with('notice', 'El usuario ha sido creado correctamente');

   }
   public function edit($id) {

      try {
         
         $user = User::find($id);

         $usertypes = UserType::lists('description', 'id');

      } catch (Exception $e) {
         
         return Redirect::back();
      }

      return View::make('users.edit', compact('user', 'usertypes'));
      
   }

   public function update($id) {

      try {

         $inputs = Input::all();

         $user = User::find($id);

         $user->name = $inputs['name'];

         $user->email = $inputs['email'];

         if ($inputs['password']) {
            
            $user->password = $inputs['password'];
         }

         if (isset($inputs['active'])) {
            
            $user->active = $inputs['active'];
         }

         if($user->id != 1) {

            $user->usertype_id = $inputs['usertype_id'];
         }

         $user->save();
         
      } catch (Exception $e) {
         
         return Redirect::back();

      }

      return Redirect::to('users')->with('notice', 'El usuario ha sido actualizado correctamente');
   }

   public function destroy ($id) {
      try {
         if ($id != 1) {

            $user = User::find($id);

            $user->delete();  
         }
      } catch (Exception $e) {

         return Redirect::back();
      }
      return Redirect::back();
   }

   public function perfil () {

      $user = Auth::user();

      $usertypes = UserType::lists('description', 'id');

      return View::make('users.perfil', compact('user', 'usertypes'));  

   }

}
?>