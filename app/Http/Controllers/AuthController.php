<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $validator= Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255|unique:users',
            'password'=>'required|string|min:6',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['access_token' =>$token, 'token_type'=>'Bearer'], 201);

  
    }

    public function login(Request $request)
    {
      if(!auth()->attempt($request->only('email', 'password'))){
        return response()->json(['message'=> 'invalid credentials'],401);
      }
      $user = User::where('email',$request['email'])->firstorfail();
      $token = $user->createToken('auth_token')->plainTextToken;
      return response()->json(['access_token' => $token, 'token_type'=>'Bearer' ], 200);
    }
}
