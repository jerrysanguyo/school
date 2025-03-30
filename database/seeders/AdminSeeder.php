<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name'        => 'Jerry',
            'middle_name'       => 'Gonzaga',
            'last_name'         => 'Sanguyo',
            'email'             => 'jsanguyo1624@gmail.com',
            'contact_number'    => '09271852710',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'role'              => 'admin',
            'remember_token'    => null,
        ]);
    }
}
