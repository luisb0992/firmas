<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function login(Request $request)
	  {
    	$this->validate($request, [
    		'user'      => 'required',
    		'password'  => 'required',
    	]);


      if (Auth::attempt($request->only(['user','password']))){

      			if (Auth::user()->status == "inactivo") {

      				Auth::logout();
      				return redirect()->route('login')->withErrors('Usuario Inactivo, contacte con el admin');

      			}else{

      			   return redirect()->intended('dashboard');

      			}

      }else{
      		return redirect()->route('login')->withErrors('Usuario o clave incorrecta');

      }

    }

    public function logout()
	  {
      Auth::logout();
	 		return redirect()->route('login');
	  }
}
