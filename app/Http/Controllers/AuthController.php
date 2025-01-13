<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');

    }

    public function logout(Request $request){
        $res=Http::withToken(session('token'))->post(config('services.api.url').'/login');
        if($res->successful()){
        session()->flush();
        
        return redirect('/');
    }
            
    }

    public function dologin(Request $request){
        $credentials = $request->only(['email', 'password']);
        $res=Http::post(env('APP_API_URL').'/login',$credentials);
        
        if ($res->successful()) {
            $json = $res->json();
            $userData=$json['data'];

            Session::put([
                'token'=>$json['token'],
                'name'=>$userData['name'],
                'email'=>$userData['email'],
                'profile'=>$userData['profile'],
                'role'=>$userData['role'],
                'id'=>$userData['id'],
            ]);

            if($userData['role']=='admin'){
                return redirect('/admin/dashboard');
            }
            if($userData['role']=='organizer'){
                return redirect('/organizer/dashboard') ;
            }
            if($userData['role']=='partisipan'){
                return redirect('/user/dashboard');
            }
        }else{

        }
    }
}
