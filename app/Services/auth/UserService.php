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

    public function store(array $data): User
    {
        return User::create([
            'first_name'    => $data['first_name'],
            'middle_name'   => $data['middle_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'contact_number'    => $data['contact_number'],
            'password'      => bcrypt('password'),
            'type'          =>  $data['type'],
            'role'          =>  $data['role'],
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