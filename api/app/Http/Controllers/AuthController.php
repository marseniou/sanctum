<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __constuct(Request $request){
        $this->middleware('auth:sanctum')->except('login');
    }
    public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        //return response()->json(['user'=>auth()->user()]);
    }
    public function logout(Request $request){
        auth()->logout();
    }
}
