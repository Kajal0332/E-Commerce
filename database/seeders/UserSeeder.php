<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // also have user ragister data of as a user
        // user name is 'Super user'
        // id name is 'user@example.com'
        // password is 'userpassword@123'
        DB::table('users')->insert([
            // [
            //     'name' => 'Super Admin',
            //     'email' => 'admin@example.com',
            //     'password' => Hash::make('password@123'),
            //     'role' => 'admin',

            // ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('userpassword@123'),
                'role' => 'user',

            ]
        ]);
    }
}
