<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function dashboard() {

        return view('admin.dashboard');
    }

    //events
    function eventIndex() {
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

    //category
    function categoryIndex() {
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/category');
        if($res->successful()){
            $json = $res->json();
            $data['category']=$json['data'];

        }

        return view('admin.category.index',$data);
    }

    function categoryStore(Request $request) {
         $validate = $request->validate([
            'name'=>'nullable|string',
        ]);

        $res = Http::withToken(session('token'))->post(config('services.api.url').'/category',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/category')->with('message',$json['message']);
        }

    }
    function categoryUpdate(Request $request,$id) {
         $validate = $request->validate([
            'name'=>'nullable|string'
        ]);

        $res = Http::withToken(session('token'))->patch(config('services.api.url').'/category/'.$id,$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/category')->with('message',$json['message']);
        }
    }
    function  categoryDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/category/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/category')->with('message',$json['message']);
        }
    }


    //documentation
    function documentationIndex() {
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/documentation');
        if($res->successful()){
            $json = $res->json();
            $data['documentation']=$json['data'];

        }
        return view('admin.dokumentasi',$data);
    }

    function documentationDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/documentation/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/documentation')->with('message',$json['message']);
        }
    }

    //ticket
    function ticketIndex() {
        $res = Http::withToken(session('token'))->get(config('services.api.url').'/tickets');
        if($res->successful()){
            $json = $res->json();
            $data['ticket']=$json['data'];
        }
        return view('admin.tiket',$data);
    }
   function ticketDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/tickets/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/ticket')->with('message',$json['message']);
        }

    }
    //feedback
    function feedbackIndex() {
        $res = Http::get(config('services.api.url').'/feedback');
        if($res->successful()){
            $json=$res->json();
            $data['feedback'] = $json['data'];
        }
        return view('admin.feedbacks',$data);
    }
    function feedbackDelete($id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/feedback/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/feedbacks')->with('message',$json['message']);
        }

    }

    //user
    function userIndex($role)  {
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

    function userStore(Request $request)  {

       $validate = $request->validate([
            'name'=>'required|string',
            'profile'=>'required|image|mimes:png,jpg,jpeg',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'role'=>'required'

        ]);

        $res = Http::withToken(session('token'))->attach(
            'profile', file_get_contents($_FILES['profile']['tmp_name']), $_FILES['profile']['name']
        )->post(config('services.api.url').'/users',$validate);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/account/'.$request->role)->with('message',$json['message']);
        }else{
            dd($res->body());
        }


        
    }

    function userUpdate(Request $request,$id) {

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
    function userDelete(Request $request,$id)  {
        $res = Http::withToken(session('token'))->delete(config('services.api.url').'/users/'.$id);
        if ($res->successful()) {
            $json = $res->json();
            return redirect('/admin/account/'.$request->role)->with('message',$json['message']);
        }

    }


}
