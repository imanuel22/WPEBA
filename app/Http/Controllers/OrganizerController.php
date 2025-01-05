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
        $data = [];
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
            $data['categories'] = $json['data'];
        }else{
            abort(404);
        }
        return view('organizer.event.create',$data);
    }

    public function eventStore(Request $request)
{
    // Validasi input
    $validate = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'images.*' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Validasi array gambar
        'start_datetime' => 'nullable|date',
        'duration' => 'nullable|integer',
        'location' => 'nullable|string',
        'event_category_ids' => 'nullable|array',
    ]);

    // Tambahkan data tambahan
    $validate['user_id'] = session('id');
    $validate['status'] = 'upcoming';

    // Inisialisasi HTTP Client
    $http = Http::withToken(session('token'));

    // Tambahkan data non-file sebagai bagian multipart
    foreach ($validate as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $arrayValue) {
                $http = $http->attach("{$key}[]", (string)$arrayValue); // Pastikan dikirim sebagai string
            }
        } else {
            $http = $http->attach($key, (string)$value); // Kirim data sebagai string
        }
    }

    // Lampirkan file gambar
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $http = $http->attach(
                'images[]',
                file_get_contents($image->getRealPath()), // Baca konten file
                $image->getClientOriginalName() // Gunakan nama asli file
            );
        }
    }

    // Kirim permintaan POST ke API
    $res = $http->post(config('services.api.url') . '/events');
    // Tindak lanjut berdasarkan respons
    if ($res->successful()) {
        $json = $res->json();
        return redirect('/organizer/event')->with(['status'=>$json['success'],'message'=> $json['message']]);
    } else {
        // Jika terjadi error, kembalikan ke halaman sebelumnya dengan pesan error
        return back()->withErrors(['error' => $res->body()])->withInput();
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

public function eventUpdate(Request $request, $id)
{
    // Validasi input
    $validate = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'images.*' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'status' => 'nullable|in:upcoming,in_progress,completed',
        'start_datetime' => 'nullable|date',
        'duration' => 'nullable|integer',
        'location' => 'nullable|string',
        'event_category_ids' => 'nullable|array',
    ]);

    $validate['user_id'] = session('id');

    $http = Http::withToken(session('token'));

    // Mengirim data sebagai JSON jika tidak ada file
    if (!$request->hasFile('images')) {
        $res = $http->patch(config('services.api.url') . '/events/' . $id, $validate);
    } else {
        // Menggunakan POST dengan _method=PATCH untuk multipart form data
        $http = $http->attach('_method', 'PATCH');

        foreach ($validate as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $arrayValue) {
                    $http = $http->attach("{$key}[]", (string)$arrayValue);
                }
            } else {
                $http = $http->attach($key, (string)$value);
            }
        }

        foreach ($request->file('images') as $image) {
            $http = $http->attach('images[]', file_get_contents($image->getRealPath()), $image->getClientOriginalName());
        }

        $res = $http->post(config('services.api.url') . '/events/' . $id);
    }

    if ($res->successful()) {
        $json = $res->json();
        return redirect('/organizer/event/' . $id)->with(['status' => $json['success'], 'message' => $json['message']]);
    } else {
        dd($res->body());
        return back()->withErrors(['error' => $res->body()])->withInput();
    }
}



    function eventDelete($id) {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/events/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/' )->with('message',$json['message']);
        }
    }


    //information
    function informationIndex($event_id){
        $data = [];
        $res = Http::get(config('services.api.url').'/information');
        if($res->successful()){
            $json=$res->json();
            $information = collect($json['data'])->where('event_id',$event_id);
            $data['information'] = $information;
        }
        return view('organizer.information.index',$data);
    }

    function informationStore(Request $request,$event_id) {
         $validate = $request->validate([
            'whatapps'=>'nullable|numeric',
            'telephone'=>'nullable|numeric',
            'facebook'=>'nullable|string|max:100',
            'instagram'=>'nullable|string|max:100',
            'email'=>'nullable|string|max:100',
            'website'=>'nullable|string|max:100',
        ]);

        $validate['event_id']=$event_id;
        $res = Http::withToken(session('token'))->post(config('services.api.url').'/information',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/information')->with('message',$json['message']);
        }

    }
    function informationUpdate(Request $request,$event_id,$id) {
         $validate = $request->validate([
            'whatapps'=>'nullable|numeric',
            'telephone'=>'nullable|numeric',
            'facebook'=>'nullable|string|max:100',
            'instagram'=>'nullable|string|max:100',
            'email'=>'nullable|string|max:100',
            'website'=>'nullable|string|max:100',
        ]);

        $validate['event_id']=$event_id;
        $res = Http::withToken(session('token'))->patch(config('services.api.url').'/information/'.$id,$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/information')->with('message',$json['message']);
        }
    }


    function informationDelete($event_id,$id) {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/information/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/information')->with('message',$json['message']);
        }
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


    function ticketStore(Request $request,$event_id) {
        $validate = $request->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'payment_method'=>'required|string',
            'payment_number'=>'required|string',
            'payment_name'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ]);
        
        $validate['event_id']=$event_id;
        $res = Http::withToken(session('token'))->attach(
            'image', file_get_contents($_FILES['image']['tmp_name']), $_FILES['image']['name']
            )->post(config('services.api.url').'/tickets',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/ticket')->with('message',$json['message']);
        }
    }
    function ticketUpdate(Request $request,$event_id,$id) {
         $validate = $request->validate([
            'name'=>'nullable|string',
            'price'=>'nullable|numeric',
            'quantity'=>'nullable|numeric',
            'payment_method'=>'required|string',
            'payment_number'=>'required|string',
            'payment_name'=>'required|string',
            'image'=>'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $validate['event_id']=$event_id;

        if($_FILES['image']['error'] === 4){
            $res = Http::withToken(session('token'))->patch(config('services.api.url').'/tickets/'.$id,$validate);
        }else{
            $res = Http::withToken(session('token'))->attach(
                'image', file_get_contents($_FILES['image']['tmp_name']), $_FILES['image']['name']
            )->patch(config('services.api.url').'/tickets/'.$id,$validate);
        }
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/ticket')->with('message',$json['message']);
        }
    }

    function ticketDelete($event_id,$id) {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/tickets/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/ticket')->with('message',$json['message']);
        }
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

    function documentationsStore(Request $request,$event_id) {
        $validate = $request->validate([
            'description'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ]);
   
        $validate['event_id']=$event_id;
        $res = Http::withToken(session('token'))->attach(
            'image', file_get_contents($_FILES['image']['tmp_name']), $_FILES['image']['name']
        )->post(config('services.api.url').'/documentation',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/documentations')->with('message',$json['message']);
        }

    }
    function documentationsUpdate(Request $request,$event_id,$id) {
         $validate = $request->validate([
            'description'=>'nullable|string',
            'image'=>'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $validate['event_id']=$event_id;
        if($_FILES['image']['error'] === 4){
            $res = Http::withToken(session('token'))->patch(config('services.api.url').'/documentation/'.$id,$validate);
        }else{
            $res = Http::withToken(session('token'))->attach(
                'image', file_get_contents($_FILES['image']['tmp_name']), $_FILES['image']['name']
            )->patch(config('services.api.url').'/documentation/'.$id,$validate);
        }
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/documentations')->with('message',$json['message']);
        }
    }

    function documentationsDelete($event_id,$id) {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/documentation/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/organizer/event/'.$event_id.'/documentations')->with('message',$json['message']);
        }
    }
    //regostrations

    function registrationsIndex(Request $request,$event_id){
        $data = [];
        $status = $request->get('status') ?? 'pending';

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
