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
    function dokumentasi() {
        return view('admin.dokumentasi');
    }
    function tiket() {
        return view('admin.tiket');
    }
    function admins() {
        return view('admin.admins');
    }
    function feedbacks() {
        return view('admin.feedbacks');
    }
    function admins_account() {
        $data = [];
        $res = Http::get(config('services.api.url').'/users');
        if($res->successful()){
            $json=$res->json();
            $data['users'] = $json['data'];
        }
        return view('admin.admins_account',$data);
    }
    function organizer_account() {
        return view('admin.organizer_account');
    }
    function participant_account() {
        return view('admin.participant_account');
    }
}
