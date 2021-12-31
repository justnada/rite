<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        //return request()->all();

        // validation
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // hashing password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // insert into user db
        User::create($validatedData);

        //$request->session()->flash('succesRegister', 'Registration successed! Please sign in');

        return redirect('/signin')->with('succesRegister', 'Registration successed! Please sign in');
    }
}
