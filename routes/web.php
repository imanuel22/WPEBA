<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/login', function () {
    $res=Http::get(env('APP_API_URL').'/users');
    $json=$res->json();
    return view('welcome',['users'=>$json['data']]);
});

Route::get('/main',function ()  {
    return view('admin.dashboard');
});
