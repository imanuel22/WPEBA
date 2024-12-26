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

    public function eventCreate(){
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/category');
        if($res->successful()){
            $json=$res->json();
            $categories = $json['data'];
            $data['categories'] = $categories;
        }else{
            abort(404);
        }
        return view('organizer.event.create',$data);
    }

    public function eventStore(Request $request){
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg', // Validasi array gambar
            'start_datetime' => 'nullable|date',
            'duration' => 'nullable|integer',
            'location' => 'nullable|string',
            'event_category_ids' => 'nullable|array',
        ]);
        
        $validate['user_id']=session('id');
        $validate['status']='upcoming';
        
        $res = Http::withToken(session('token'))->post(config('services.api.url').'/events',$validate);
        if ($res->successful()) {
            $json = $res->json();
            redirect('/organizer/event/')->with('message',$json['message']);
        }
    }

    public function eventEdit(Request $request,$id){
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

        $res2 = Http::withToken(session('token'))->get(config('services.api.url').'/category');
        if($res2->successful()){
            $json=$res2->json();
            $categories = $json['data'];
            $data['categories'] = $categories;
        }else{
            abort(404);
        }
        return view('organizer.event.edit',$data);
    }

    public function eventUpdate(Request $request,$id){
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg', // Validasi array gambar
            'status' => 'nullable|in:upcoming,in_progress,completed',
            'start_datetime' => 'nullable|date',
            'duration' => 'nullable|integer',
            'location' => 'nullable|string',
            'event_category_ids' => 'nullable|array',
        ]);

        $validate['user_id']=session('id');
        
        $res = Http::withToken(session('token'))->patch(config('services.api.url').'/events/'.$id,$validate);
        if ($res->successful()) {
            $json = $res->json();
            redirect('/organizer/event/'.$id)->with('message',$json['message']);
        }
    }



    //information
    function informationIndex($event_id){
        $data = [];
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/information');
        if($res->successful()){
            $json=$res->json();
            $information = collect($json['data'])->where('event_id',$event_id);
            $data['information'] = $information;
        }
        return view('organizer.information.index',$data);
    }
    //feedback
    function feedbackIndex($event_id){
        $data = [];
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/feedback');
        if($res->successful()){
            $json=$res->json();
            $feedback = collect($json['data'])->where('event_id',$event_id);
            $data['feedback'] = $feedback;
        }
        return view('organizer.feedback.index',$data);
    }

    //ticket
    function ticketIndex($event_id){
        $data = [];
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/tickets');
        if($res->successful()){
            $json=$res->json();
            $ticket = collect($json['data'])->where('event_id',$event_id);
            $data['ticket'] = $ticket;
        }
        return view('organizer.ticket.index',$data);
    }

    //documentations
    function documentationsIndex($event_id){
        $data = [];
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/documentation');
        if($res->successful()){
            $json=$res->json();
            $documentations = collect($json['data'])->where('event_id',$event_id);
            $data['documentations'] = $documentations;
        }
        return view('organizer.documentations.index',$data);
    }

    function registrationsIndex(Request $request,$event_id){
        $data = [];
        $status = $request->get('status');

        $res = Http::withToken(session('token'))->get(config('services.api.url').'/registrations');
        if($res->successful()){
            $json = $res->json();

            $filteredRegistrations = array_filter($json['data'], function($registration) use ($event_id,$status) {
                return isset($registration['ticket']['event_id'],$registration['status']) 
                && $registration['ticket']['event_id'] == $event_id 
                && $registration['status'] == $status;
            });

            $data['registrations'] = $filteredRegistrations;
        }

        return view('organizer.registrations.index', $data);
    }
    function registrationsVerification(Request $request,$event_id,$id){
        $validate = $request->validate([
            'status' => 'required|in:confirmed,cancelled',
        ]);
        $res = Http::withToken(session('token'))->patch(config('services.api.url').'/registrations/verification/'.$id,$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/registrations')->with('message',$json['message']);
        }
    }

}
