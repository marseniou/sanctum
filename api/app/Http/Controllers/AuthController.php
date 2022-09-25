<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __constuct(Request $request){
        $this->middleware('auth:sanctum')->except('login', 'register');
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
    public function register(Request $request)
    {
        try {
            $messages = [
            'name.required' => 'Το όνομα είναι υποχρεωτικό',
            'name.min' => 'Το όνομα πρέπει να έχει τουλάχιστον 3 χαρακτήρες',
            'name.max' => 'Το όνομα δεν πρέπει να υπερβαίνει τους 20 χαρακτήρες',
            'email.required' => 'Το email είναι υποχρεωτικό',
            'email.unique' => 'Το email ήδη χρησιμοποιείτε',
            'password.required' => 'Ο Κωδικός είναι υποχρεωτικός',
            'password_r.required' => 'Η επαλήθευση κωδικού είναι υποχρεωτική',
            'password_r.same' => 'Ο Κωδικός είναι διαφορετικός',
            'password.min' => 'Ο Κωδικός πρέπει να έχει τουλάχιστον 8 χαρακτήρες',
        ];

            $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_r' => 'required|same:password'
        ], $messages);
            $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => app('hash')->make($request->password, ['rounds' => 12]),
         ]);

            $u = auth()->login($user);
            return response()->json(['status'=>$u,'email'=>$user->email, 'password'=>$request->password]);
        } catch (ValidationException $e) {
            return response()->json([
            'status' => 'error',
            'msg'    => 'Error',
            'errors' => $e->errors(),
        ], 422);
        }
    }
}
