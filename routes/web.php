<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Route::get('/login', function () {
//     $res=Http::get(env('APP_API_URL').'/users');
//     $json=$res->json();
//     return view('welcome',['users'=>$json['data']]);
// });

Route::get('/main',function ()  {
    return view('admin.dashboard');
});

Route::get('/login',[AuthController::class,'login']);
Route::post('/dologin',[AuthController::class,'dologin'])->name('dologin');

// admin
Route::prefix('/admin')->group(function(){
    Route::get('/');
    Route::get('/dashboard');
});

// organizer
Route::prefix('/organizer')->group(function(){
    Route::get('/');
    Route::get('/dashboard');
});

Route::prefix('/partisipan')->group(function(){
    Route::get('/');
    Route::get('/dashboard');
});