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

Route::get('/event',function ()  {
    return view('admin.event');
});

Route::get('/tiket',function ()  {
    return view('admin.tiket');
});

Route::get('/dokumentasi',function ()  {
    return view('admin.dokumentasi');
});



Route::get('/login',[AuthController::class,'login']);
Route::post('/dologin',[AuthController::class,'dologin'])->name('dologin');
