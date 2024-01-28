<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class AppController extends Controller
{
    //

    public function signUp(Request $request){
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'fatherLastName'=> 'required|string',
        'motherLastName' => 'required|string',
        'password' => 'required|string'
    ]);
      User::create([
        'name' => $request->name,
        'fatherLastName' => $request->fatherLastName,
        'motherLastName' => $request->motherLastName,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    

     return response()->json([
       'message' => 'Successfully created user!'], 201);
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        'remember_me' => 'boolean'
    ]);

    $credentials = request(['email', 'password']);

    if (!Auth::attempt($credentials))
        return response()->json([
            'message' => $credentials
        ], 401);


      $user= Auth::user();
      $tokenResult = $user->createToken('App');



    $token = $tokenResult->token;


    if ($request->remember_me)
        $token->expires_at = Carbon::now()->addWeeks(1);
    $token->save();

    return response()->json([
        'access_token' => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
    ]);
}




public function logout(Request $request)
{
    $request->user()->token()->revoke();
    return response()->json([
        'message' => 'Successfully logged out'
    ]);
}


public function user(Request $request)
{
    return response()->json($request->user());
}


}
