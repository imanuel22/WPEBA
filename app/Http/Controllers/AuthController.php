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

    }
    public function register(){
        return view('auth.register');
    }
    public function doregister(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'confirm-password'=>'required|same:password',
            'profile'=>'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $credentials = $request->only(['name','email','password']);
        $credentials['role'] = 'participant';
        $res = Http::attach(
            'profile', file_get_contents($_FILES['profile']['tmp_name']), $_FILES['profile']['name']
        )->post(config('services.api.url').'/register',$credentials);
        if ($res->successful()) {
            redirect('/login');
        }
                    dd($res->body(),$request);

    }

    public function dologin(Request $request){
        $credentials = $request->only(['email', 'password']);
        $res=Http::post('http://api-wpeba.test/api/login',$credentials);

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
            if($userData['role']=='participant'){
                return redirect('/');
            }
        }else{
            dd($res->body());
        }
    }
}
