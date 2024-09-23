<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials, $request->remember)) {
            // Authentication passed, redirect to intended route
            return Redirect::intended('/home'); // Cambia '/home' por la ruta a la que quieras redirigir
        }

        // Authentication failed, redirect back with error
        return Redirect::back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
