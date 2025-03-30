<?php

namespace App\Services\auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function logout(): void
    {
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken();
    }
    
    public function check(array $data): bool
    {
        return Auth::attempt([
            'email' => $data['email'],
            'password'=> $data['password'],
        ]);
    }

    public function update(array $data, $user): void
    {
        $user->update($data);
    }

    public function destroy($user): void
    {
        $user->delete();
    }
}