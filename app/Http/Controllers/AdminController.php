<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function dashboard() {
        return view('admin.dashboard');
    }
    function event() {
        return view('admin.event');
    }
}
