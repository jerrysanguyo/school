<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'first_name'     => $faker->firstName,
                'middle_name'    => $faker->firstName,
                'last_name'      => $faker->lastName,
                'email'          => $faker->unique()->safeEmail,
                'contact_number' => $faker->phoneNumber,
                'password'       => Hash::make('password'),
                'role'           => 'user',
                'type'           => $faker->randomElement(['student', 'faculty']),
            ]);
        }
    }
}
