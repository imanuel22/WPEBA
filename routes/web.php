<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('index');
});

Route::get('/event', [GuestController::class,'events']);
Route::get('/ticket', [GuestController::class, 'tickets']);
Route::get('/landing', [GuestController::class,'landing']);
