<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    public function get()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function post(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
