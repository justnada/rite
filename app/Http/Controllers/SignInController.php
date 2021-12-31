<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view('signin.index', [
            'title' => 'Sign In',
            'active' => 'signin'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('signinError', 'Sign in failed!');
    }

    public function signout()
    {
        // logging out from auth 
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/signin');
    }

    // public function signout(Request $request)
    // {
    //     // logging out from auth 
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/signin');
    // }
}
