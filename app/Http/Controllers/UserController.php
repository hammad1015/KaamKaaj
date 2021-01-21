<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $user   = Auth::user();
        $events = $user->events;
        

        return view('pages.profile', [
            'user'   => $user,
            'events' => $events,
        ]);
    }

    public function register(Request $request)
    {
        $user = Auth::user();
        
        /* -----------------get------------------- */
        if ($request->isMethod('get'))
        {
            return view('pages.register');
        }

        /* -----------------post------------------ */
        // validating request
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email', 
            'password'  => 'required|confirmed',
        ]);
        
        // creating user entry in the database
        $usr = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // authenticating user
        Auth::attempt($request->only('email', 'password'));

        // redirecting to user profile
        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        /* -----------------get------------------- */
        if ($request->isMethod('get'))
        {
            return view('pages.login');
        }

        /* -----------------post------------------ */
        // validating request
        $this->validate($request, [
            'email'     => 'required|email', 
            'password'  => 'required',
        ]);

        // authenticating user
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Invalid Login Details');
        }

        // redirecting user to home
        return redirect()->route('profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }

}
