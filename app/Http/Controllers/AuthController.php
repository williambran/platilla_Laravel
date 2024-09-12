<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //



    public function store(Request $request){

      $this->validate($request, [
        'email' => 'required|unique:users|email',
        'name' => 'required|string',
        'password' => 'required|string|min:8|max:16',
        'password_confirmation' => 'required|same:password'

      ]);

      User::create([
        'name' => $request->name,
        'fatherLastName' => $request->fatherLastName,
        'motherLastName' => $request->motherLastName,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    auth()->attempt([
      'email'=> $request->email,
      'password' => $request->password
    ]);

    return redirect()->route('store.index');

    }




    public function login(Request $request){

      $this->validate($request , [
        'email' => 'required',
        'password' => 'required'
      ]);

      auth()->attempt([
        'email'=> $request->email,
        'password' => $request->password
      ]);

      return redirect()->route('store.index');
    }


    public function logout(Request $request){


      Auth::logout();

      return redirect()->route('store.index');
    }

}
