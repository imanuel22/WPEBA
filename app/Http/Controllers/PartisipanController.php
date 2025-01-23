<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PartisipanController extends Controller
{
    

    function dashboard() {
        $res = Http::get(config('services.api.url').'/events');
        
        if($res->successful()){
            $json = $res->json();
            $data['events'] = $json['data'];
        }
        return view('participant.dashboard',$data);
    }
    function dashProfile() {
        return view('participant.dashProfile');
    }

    function buyTicket(Request $request)  {
        $request->validate([
            'price' =>'required|numeric',
            'event_id' =>'required',
            'ticket_id' =>'required',
            'image_payment' =>'required|file|image|mimes:png,jpg,jpeg',
        ]);
        $validate['user_id'] = session('id');
        $validate['ticket_id'] = $request->input('ticket_id');
        $validate['status'] = 'pending';
        $validate['total_price'] = $request->input('price') * 1;
        $res = Http::withToken(session('token'))->attach(
            'image_payment', file_get_contents($_FILES['image_payment']['tmp_name']), $_FILES['image_payment']['name']
            )->post(config('services.api.url').'/registrations',$validate);
            if ($res->successful()) {
                $json = $res->json();
                return redirect('/event/'.$request->input('event_id'))->with('message',$json['message']);
            }else{
                dd($res->body());
            }
    }

     //ticket
     public function ticketParti() {
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/tickets');
        if($res->successful()){
            $json = $res->json();
            $data['ticket']=$json['data'];
        }
        return view('participant.ticket',$data);
    }
 
    //feedback
    function feedbackParti() {
        $res = Http::get(config('services.api.url').'/feedback');
        if($res->successful()){
            $json=$res->json();
            $data['feedback'] = $json['data'];
        }
        $res = Http::get(config('services.api.url').'/events');
        if($res->successful()){
            $json=$res->json();
            $event['events'] = $json['data'];
        }
        return view('participant.feedbacks',$data, $event);
    }
    function feedbackDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/feedback/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/participant/feedbacks')->with('message',$json['message']);
        }

    }

}
