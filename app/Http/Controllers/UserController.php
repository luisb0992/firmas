<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',[
          'users' =>  User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'     => 'required',
          'password' => 'required',
          'email'    => 'required|unique:users,email',
          'user'     => 'required|unique:users,user'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);

        if($user->save()){
            return redirect("users")->with([
              'flash_message' => 'Usuario agregado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }else{
            return redirect("users")->with([
              'flash_message'   => 'Ha ocurrido un error.',
              'flash_class'     => 'alert-danger',
              'flash_important' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findOrFail($id);
        return view("users.view", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("users.edit", [
          "user" => user::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::findOrFail($id);

      $this->validate($request, [
        'name'   => 'required',
        'email'  => 'required',
        'user'   => 'required|unique:users,user,'.$user->id.',id'
      ]);

      $user->fill($request->all());

      if($user->save()){
        return redirect("users")->with([
            'flash_message' => 'Usuario actualizado correctamente.',
            'flash_class'   => 'alert-success'
        ]);
      }else{
        return redirect("users")->with([
            'flash_message'   => 'Ha ocurrido un error.',
            'flash_class'     => 'alert-danger'
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->delete()){
          return redirect('users')->with([
            'flash_class'   => 'alert-success',
            'flash_message' => 'Usuario eliminado con exito.'
          ]);
        }else{
          return redirect('users')->with([
            'flash_class'     => 'alert-danger',
            'flash_message'   => 'Ha ocurrido un error.'
          ]);
        }
    }

    public function perfil()
    {
    	$user = Auth::user();
    	return view('users.perfil',['perfil'=>$user]);
    }

    public function update_perfil(Request $request)
    {
    	$user = User::find(Auth::user()->id);

      $this->validate($request, [
        'name'     => 'required',
        'email'    => 'required|unique:users,email,'.$user->id.',id',
        'user'     => 'required|unique:users,user,'.$user->id.',id'
      ]);

    	$user->fill($request->all());
      if($request->input('checkbox') === "Yes"){
      	$this->validate($request,[
          'password' => 'required|min:6|confirmed'
    		]);
        $user->password = bcrypt($request->password);
      }else{
        $user->password = $user->password;
      }

    	if($user->save()){
        return redirect('perfil')->with([
          'flash_message' => 'Cambios guardados correctamente.',
          'flash_class'   => 'alert-success'
        ]);
    	}else{
        return redirect('perfil')->with([
          'flash_message'   => 'Ha ocurrido un error.',
          'flash_class'     => 'alert-danger'
        ]);
    	}
    }

    public function userStatus($id){

      $user = User::find($id);

        if ($user->status == "activo" || $user->status == "") {

          $user->status = "inactivo";

      }else{

          $user->status = "activo";

      }

      if ($user->save()) {
          return redirect('users')->with([
              'flash_message' => 'Status actualizado con exito!.',
              'flash_class'   => 'alert-success'
          ]);
      }
    }
}
