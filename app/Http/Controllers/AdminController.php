<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function dashboard() {
        
        return view('admin.dashboard');
    }
    function event() {
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/events');
        if($res->successful()){
            $json = $res->json();
            $data['events']=$json['data'];

        }
        return view('admin.event',$data);
    }
    function eventDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/events/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/event')->with('message',$json['message']);
        }
        
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

    //account
    function accountIndex($role)  {
        $data = [];
        if (!$role || !in_array($role, ['admin', 'organizer', 'participant'])) {
            abort(403);
        }
        $res = Http::get(config('services.api.url').'/users');
        if($res->successful()){
            $json=$res->json();
            $user = collect($json['data'])->where('role',$role);
            $data['users'] = $user;
        }

        return view('admin.user.account',$data);
    }

    function accountStore(Request $request)  {
       $validate = $request->validate([
            'name'=>'required|string',
            'profile'=>'required|image|mimes:png,jpg,jpeg',
            'email'=>'required|email',
            'role'=>'required'
        ]);
        
        $res = Http::withToken(session('token'))->attach(
            'image', file_get_contents($_FILES['image']['tmp_name']), $_FILES['image']['name']
        )->post(config('services.api.url').'/tickets',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/account/'.$request->role)->with('message',$json['message']);
        } 
    }
    
    function accountUpdate(Request $request,$id) {

         $validate = $request->validate([
            'name'=>'nullable|string',
            'profile'=>'nullable|image|mimes:png,jpg,jpeg',
            'email'=>'nullable|email',
        ]);
        $res = Http::withToken(session('token'))->patch(config('services.api.url').'/users/'.$id,$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/account/'.$request->role)->with('message',$json['message']);
        }
    }
    


    // function admins_account() {
    //     $data = [];
    //     $res = Http::get(config('services.api.url').'/users');
    //     if($res->successful()){
    //         $json=$res->json();
    //         $data['users'] = $json['data'];
    //     }
    //     return view('admin.admins_account',$data);
    // }
    // function organizer_account() {
    //     return view('admin.organizer_account');
    // }
    // function participant_account() {
    //     return view('admin.participant_account');
    // }
}
