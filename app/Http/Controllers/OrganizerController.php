<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    function dashboard() {
        return view('organizer.dashboard');        
    }

    function eventIndex(Request $request){
        $search = $request->input('search');
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/events');
        if($res->successful()){
            $json=$res->json();
            $events = collect($json['data'])->where('user_id',session('id'));
            if ($search) {
                $events = $events->filter(function ($event) use ($search) {
                    return str_contains(strtolower($event['title']), strtolower($search));
                });
            }
            $data['event'] = $events;
        }
        return view('organizer.event.index',$data);
    }
    
    function eventShow($id){
        $data = [];
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/events/'.$id);
        if($res->successful()){
            $json=$res->json();
            $events = $json['data'];
            if($events['user_id']!=session('id')){
                abort(403, 'Unauthorized access');
            }
            $data['event'] = $events;
        }else{
            abort(404);
        }
        
        return view('organizer.event.show',$data);
    }
}
