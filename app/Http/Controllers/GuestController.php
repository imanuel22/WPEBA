<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
    function landing() {
        return view('guest.landing');
    }
    function tickets() {
        return view('guest.ticket');
    }
    function events() {
        return view('guest.events');
    }
    // function events() {
    //     $res = Http::get(env('APP_API_URL').'/events');
    //     if($res->successful()){
    //         $json = $res->json();
    //         $data=['events'=>$json['data']];
    //     };
    //     return view('guest.events.index',$data);
    // }
}
