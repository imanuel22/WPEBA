<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartisipanController extends Controller
{
    function tickets() {
        return view('participant.ticket');
    }
    function events() {
        return view('participant.events');
    }

    function dashboard() {
        return view('participant.dashboard');
    }

}
