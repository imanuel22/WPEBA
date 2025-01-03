<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
    function landing() {
        $res = Http::get(config('services.api.url').'/events');
        if($res->successful()){
            $json = $res->json();
            $data['events'] = $json['data'];
        }
        return view('guest.landing',$data);
    }
    function tickets($id) {
        $res = Http::get(config('services.api.url') . '/events/'.$id);
        if($res->successful()){
            $json = $res->json();
            $data['event'] = $json['data'];
        }
        return view('guest.ticket',$data);
    }
    function events() {
        $res = Http::get(config('services.api.url') . '/events');

        if ($res->successful()) {
            $json = $res->json();
            $events = collect($json['data']);

            // Urutkan berdasarkan createdAt secara descending
            $sortedEvents = $events->sortByDesc('createdAt');

            // Implementasi pagination lokal
            $perPage = 12; // Jumlah item per halaman
            $page = request()->get('page', 1); // Halaman saat ini
            $paginatedEvents = $sortedEvents->forPage($page, $perPage);

            // Data untuk view
            $data['events'] = $paginatedEvents->values()->all();
            $data['pagination'] = [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $events->count(),
                'last_page' => ceil($events->count() / $perPage),
            ];
        } else {
            $data['events'] = [];
            $data['pagination'] = null;
        }

        return view('guest.events', $data);
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
