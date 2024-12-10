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

Route::get('/event',function ()  {
    return view('admin.event');
});

Route::get('/tiket',function ()  {
    return view('admin.tiket');
});

Route::get('/admindokumentasi',function ()  {
    return view('admin.dokumentasi');
});

Route::get('/organizer_dashboard',function ()  {
    return view('organizer.dashboard');
});

Route::get('/organizer_dokumentasi',function ()  {
    return view('organizer.dokumentasi');
});

Route::get('/participant_dashboard',function ()  {
    return view('participant.dashboard');
});

Route::get('/participant_event',function ()  {
    return view('participant.event');
});


Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'dologin'])->name('login');

// admin
Route::prefix('/admin')->group(function(){
    // Route::get('/',);
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/events',[AdminController::class,'events']);
});

// organizer
Route::prefix('/organizer')->group(function(){
    // Route::get('/');
    Route::get('/dashboard',[OrganizerController::class,'dashboard']);
});

Route::prefix('/partisipan')->group(function(){
    // Route::get('/');
    Route::get('/dashboard',[PartisipanController::class,'dashboard']);
});
