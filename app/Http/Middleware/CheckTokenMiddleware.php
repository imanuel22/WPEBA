<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class CheckTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        // Ambil token dari session
        $token = session('token');

        if (!$token) {
            dd($token);
            return redirect()->route('login')->withErrors('silakan login kembali.');
        }

        // Cek apakah token masih valid
        $response = Http::withToken($token)->get(config('services.api.url').'/checktoken');

        if ($response->status() === 401) { 
            $refreshResponse = Http::withToken($token)->post(config('services.api.url').'/refresh');

            if ($refreshResponse->successful()) {
                $newToken = $refreshResponse->json()['token'];
                session(['token' => $newToken]);
            } else {    
                return redirect()->route('login')->withErrors('Gagal , silakan login kembali.');
            }
        }
        
        return $next($request);
    }
}
