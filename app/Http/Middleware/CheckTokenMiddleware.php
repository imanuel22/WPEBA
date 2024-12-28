<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Support\Facades\Http;

// class CheckTokenMiddleware
// {
//     public function handle($request, Closure $next)
//     {
//         // Ambil token dari session
//         $token = session('token');

//         if (!$token) {
//             return redirect()->route('login')->withErrors('Token tidak ditemukan, silakan login kembali.');
//         }

//         // Cek apakah token masih valid
//         $response = Http::withToken($token)->get(config('services.api.check_token_endpoint'));

//         if ($response->status() === 401) { // Token kadaluwarsa
//             $refreshResponse = Http::post(config('services.api.url').'/refresh', [
//                 'refresh_token' => session('refresh_token'), // Jika menggunakan refresh token
//             ]);

//             if ($refreshResponse->successful()) {
//                 $newToken = $refreshResponse->json()['token'];
//                 session(['api_token' => $newToken]);
//             } else {
//                 return redirect()->route('login')->withErrors('Gagal menyegarkan token, silakan login kembali.');
//             }
//         }

//         return $next($request);
//     }
// }
