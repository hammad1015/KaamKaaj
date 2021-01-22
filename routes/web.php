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
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;


Route::get('/home', function () { return view('pages.home');  })->name('home'); 
Route::get('/'    , function () { return view('pages.home');  })->name('home'); 

/* -------------------------------------- User group routes ------------------------------------------- */
Route::prefix('user')->group(function(){

    Route::get ('/'         ,[UserController::class, 'index'    ])->name('profile') ->middleware('auth');    

    Route::get ('/register' ,[UserController::class, 'register' ])->name('register')->middleware('guest');
    Route::post('/register' ,[UserController::class, 'register' ]);

    Route::get ('/login'    ,[UserController::class, 'login'    ])->name('login')   ->middleware('guest');
    Route::post('/login'    ,[UserController::class, 'login'    ]);

    Route::get ('/logout'   ,[UserController::class, 'logout'   ])->name('logout')  ->middleware('auth');

});

// /* -------------------------------------- event group routes ------------------------------------------- */
// Route::prefix('event')->group(function(){

//     Route::get ('/create',[EventController::class, 'create'  ])->name('new-event') ->middleware('auth');
//     Route::post('/create',[EventController::class, 'create'  ])->name('new-event');
    
//     Route::post('/{event}/new-participant', [EventController::class, 'addParticipant'])->name('new-participant');
    
//     Route::get ('/{event}'  ,[EventController::class, 'index'   ])->name('event')     ->middleware('auth');//->middleware('authorize')


//     /* ---------------------------------- channel sub-group routes -------------------------------------- */
//     Route::prefix('channel')->group(function (){
        
//         Route::post('/{event}/create', [ChannelController::class, 'create'])->name('new-channel');//->middleware('authorize')

//         Route::get('/{channel}', [ChannelController::class, 'index'])->name('channel');//->middleware('authorize')
//     });

// });


/* -------------------------------------- event group routes ------------------------------------------- */
Route::prefix('event')->group(function(){

    Route::get ('/create',[EventController::class, 'create'  ])->name('new-event') ->middleware('auth');
    Route::post('/create',[EventController::class, 'create'  ])->name('new-event');

    
    Route::prefix('/{event}')->group(function (){

        Route::get ('/'                 , [EventController::class, 'index'          ])->name('event')     ->middleware('auth');//->middleware('authorize')
        Route::post('/new-participant'  , [EventController::class, 'addParticipant' ])->name('new-participant');
    
        
        /* ---------------------------------- channel sub-group routes -------------------------------------- */
        Route::prefix('channel')->group(function (){
    
            Route::post('/create'   , [ChannelController::class, 'create'   ])->name('new-channel');
            Route::get ('/{channel}', [ChannelController::class, 'index'    ])->name('channel');
    
        });
    });
});


