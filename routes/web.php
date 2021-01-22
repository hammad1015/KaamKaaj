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



/* -------------------------------------- universal routes ------------------------------------------- */
Route::get('/'      , function () { return view('pages.home' );  })->name('home'); 
Route::get('/home'  , function () { return view('pages.home' );  })->name('home'); 
// Route::get('/about' , function () { return view('pages.about');  })->name('about'); 



/* -------------------------------------- User group routes ------------------------------------------- */
Route::prefix('user')->group(function(){

    Route::get ('/'         ,[UserController::class, 'index'    ])->name('profile'  )->middleware('auth');    
    Route::get ('/register' ,[UserController::class, 'register' ])->name('register' )->middleware('guest');
    Route::post('/register' ,[UserController::class, 'register' ]);
    Route::get ('/login'    ,[UserController::class, 'login'    ])->name('login'    )->middleware('guest');
    Route::post('/login'    ,[UserController::class, 'login'    ]);
    Route::get ('/logout'   ,[UserController::class, 'logout'   ])->name('logout'   )->middleware('auth');
    Route::get ('/delete'   ,[UserController::class, 'delete'   ])->name('user-del' )->middleware('auth');

});

/* -------------------------------------- event group routes ------------------------------------------- */
Route::prefix('event')->group(function(){

    Route::get ('/create'   ,[EventController::class, 'create'  ])->name('new-event')->middleware('auth');
    Route::post('/create'   ,[EventController::class, 'create'  ])->name('new-event');



    /* ------------------------------ route sub-group for a specific event ---------------------------------- */
    Route::prefix('/{event}')->group(function (){

        Route::get ('/'                 ,[EventController::class, 'index'           ])->name('event'            )->middleware('auth');
        Route::get ('/leave'            ,[EventController::class, 'leave'           ])->name('leave'            )->middleware('auth');
        Route::get ('/delete'           ,[EventController::class, 'delete'          ])->name('event-del'        )->middleware('auth');
        Route::post('/new-participant'  ,[EventController::class, 'addParticipant'  ])->name('new-participant'  )->middleware('auth');
        Route::get ('/participants'     ,[EventController::class, 'listParticipants'])->name('participants'     )->middleware('auth');

    

        /* ---------------------------------- channel sub-group routes -------------------------------------- */
        Route::prefix('channel')->group(function (){
    
            Route::post('/create'   , [ChannelController::class, 'create'   ])->name('new-channel'  )->middleware('auth');



            /* --------------------------- route sub-group for a specific channel ------------------------------- */
            Route::prefix('/{channel}')->group(function (){

                Route::get ('/'         , [ChannelController::class, 'index'    ])->name('channel'      )->middleware('auth');
                Route::post('/new-post' , [PostController::class, 'create'      ])->name('new-post'     )->middleware('auth');
                
            });
        });
    });
});
