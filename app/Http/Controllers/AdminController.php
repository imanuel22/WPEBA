<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function dashboard() {
        return view('admin.dashboard');
    }
    function events() {
        $res = Http::get(env('APP_API_URL').'/events');
        if($res->successful()){
            $json = $res->json();
            $data=['events'=>$json['data']];
        };
        return view('admin.events.index',$data);
    }
}
