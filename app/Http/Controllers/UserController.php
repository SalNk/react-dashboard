<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function handleLogin(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only(['email', 'password']);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();

            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Données incorrectes');
        }
    }
    public function handleRegister(UserRequest $request)
    {
        // dd($request);
        

        if ($request) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }
}