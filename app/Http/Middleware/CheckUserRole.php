<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\GenericUser;

class CheckUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('external_user') && !Auth::check()) {
            $user = new GenericUser(session('external_user'));
            Auth::setUser($user);
        }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.index'); 
        }

        $rolePrefixMapping = config('role');
        $prefix = ltrim($request->route()->getPrefix(), '/');

        if (!isset($rolePrefixMapping[$user->role]) || $rolePrefixMapping[$user->role] !== $prefix) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
