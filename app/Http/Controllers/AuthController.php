<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function loginProcess(Request $request)
    {
        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->intended('administrator');
        } else {
            return redirect()->back()->with("flash", "errorLogin");
        }
    }
}
