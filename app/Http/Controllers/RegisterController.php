<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json('Registration Successful');
            
    }


    public function login(Request $request){
       
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', ]
        ]);

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            return response()->json(Auth::user(), 200);
        }else{
            throw ValidationException::withMessages([ 
                'email' => ['The provided credentials are correct']
            ]);
        }
    }

    public function logout(){
        Auth::logout();
    }
}
