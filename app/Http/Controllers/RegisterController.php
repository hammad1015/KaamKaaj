<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;


class RegisterController extends Controller
{
    public function __construct()
    {
    }
    
    public function get(Request $request)
    {
        // $this->middleware('guest');
        return view('pages.register');
    }

    public function post(Request $request)
    {
        // validating request
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email', 
            'password'  => 'required|confirmed',
        ]);
        
        // creating user entry in the database
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // authenticating user
        Auth::attempt($request->only('email', 'password'));

        // redirecting to home
        return redirect()->route('home');
    }
}
