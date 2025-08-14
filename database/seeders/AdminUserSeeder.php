<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        //One Admin
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin1234'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('patients')->insert([
            'FirstName' => 'adminFirstName',
            'LastName' => 'adminLastName',
            'DateOfBirth' => fake()->date(),
            'PhoneNumber' => fake('fa_IR')->unique()->phoneNumber(),
            'HomeAddress' => 'Oh No Doxxed!',
            'created_at' => '2018-08-10 13:37:27.000',
            'updated_at' => '2021-06-03 13:37:27.000',
        ]);

    }
}
