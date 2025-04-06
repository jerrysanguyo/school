<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\TokenLoginRequest;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Http;


class ApiLoginController extends Controller
{
    public function verify(Request $request)
    {
        $token = $request->query('token');
    
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user');
    
        if ($response->successful()) {
            $userData = $response->json();
            
            session(['external_user' => $userData]);
            
            $user = new GenericUser($userData);
            auth()->setUser($user);

            return redirect()->route(Auth::user()->role . '.dashboard');
        }
    
        return abort(403, 'Unauthorized or invalid token.');
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}