<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AdminController,
    AuthController,
    OrganizerController,
    PartisipanController,
};

Route::get('/',function ()  {
    return view('index');
});

Route::get('/login',[AuthController::class,'login']);
Route::post('/dologin',[AuthController::class,'dologin'])->name('dologin');

// admin
Route::prefix('/admin')->group(function(){
    // Route::get('/',);
    Route::get('/dashboard',[AdminController::class,'index']);
});

// organizer
Route::prefix('/organizer')->group(function(){
    // Route::get('/');
    Route::get('/dashboard',[OrganizerController::class,'index']);
});

Route::prefix('/partisipan')->group(function(){
    // Route::get('/');
    Route::get('/dashboard',[PartisipanController::class,'index']);
});