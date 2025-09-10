<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'phone_number' => '0000000000',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
