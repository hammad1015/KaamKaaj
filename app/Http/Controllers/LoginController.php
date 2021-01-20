<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function get()
    {
        return view('pages.login');
    }

    public function post(Request $request)
    {
        // validating request
        $this->validate($request, [
            'email'     => 'required|email', 
            'password'  => 'required',
        ]);

        // authrnticating user
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Invalid Login Details');
        }

        // redirecting user to home
        return redirect()->route('profile');
    }
}

