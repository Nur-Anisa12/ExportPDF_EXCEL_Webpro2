<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Wajib import ini di atas

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Nura',
            'email' => 'admin@nura.com',
            'password' => Hash::make('password123'), // WAJIB pakai Hash::make
        ]);
    }
}
