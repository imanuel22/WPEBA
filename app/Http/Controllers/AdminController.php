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
        return view('admin.admins_account');
    }
    function organizer_account() {
        return view('admin.organizer_account');
    }
    function participant_account() {
        return view('admin.participant_account');
    }
}
