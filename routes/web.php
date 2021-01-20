<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\LogoutController;
// use App\Http\Controllers\ProfileController;


// Route::get('/home'  , function () { return view('pages.home');  })->name('home'); 
// Route::get('/posts' , function () { return view('pages.posts'); });

// Route::get ('/logout' , [LogoutController::class, 'get'])->name('logout');
// // Route::post('/logout' , [LogoutController::class, 'post'])->name('logout');

// Route::get ('/login' , [LoginController::class, 'get'])->name('login');
// Route::post('/login' , [LoginController::class, 'post']);

// Route::get ('/register'  , [RegisterController::class, 'get'])->name('register');
// Route::post('/register'  , [RegisterController::class, 'post']);

// Route::get ('/profile'  , [ProfileController::class, 'get'])->name('profile');
// // Route::post('/profile'  , [RegisterController::class, 'post']);

// Route::get ('/new-event' , function () { return view('pages.new-event'); })->name('new-event');


use App\Http\Controllers\UserController;


Route::get('/home'  , function () { return view('pages.home');  })->name('home'); 
Route::get('/posts' , function () { return view('pages.posts'); });

Route::get ('/register'  , [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register'  , [UserController::class, 'register']);

Route::get ('/login' , [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login' , [UserController::class, 'login']);

Route::get ('/logout' , [UserController::class, 'logout'])->name('logout')->middleware('auth');
// Route::post('/logout' , [LogoutController::class, 'post'])->name('logout');

Route::get ('/profile'  , [UserController::class, 'profile'])->name('profile')->middleware('auth');
// Route::post('/profile'  , [RegisterController::class, 'post']);

Route::get ('/new-event' , function () { return view('pages.new-event'); })->name('new-event');