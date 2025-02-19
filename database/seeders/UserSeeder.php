<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'avatar' => '1720521081-admin.jpg',
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'phone_number' => '0895 - 6052 - 10002'
        ]);
        User::create([
            'avatar' => '1720521185-octalectzz.jpg',
            'username' => 'octalectzz',
            'name' => 'Octavyan Putra Ramadhan',
            'email' => 'octalectzz@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'phone_number' => '0896 - 9022 - 0404'
        ]);

        // Teacher
        User::create([
            'avatar' => '1720847355-teacher.jpg',
            'username' => 'teacher',
            'name' => 'Teacher',
            'email' => 'teacher@test.com',
            'password' => bcrypt('password'),
            'role' => 'Teacher',
            'phone_number' => '0894 - 3774 - 88977'
        ]);
        User::create([
            'avatar' => '1720521271-racekkaaa.jpg',
            'username' => 'racekkaaa',
            'name' => 'Muhammad Racka Virgian Arifai',
            'email' => 'racka04@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Teacher',
            'phone_number' => '0821 - 9761 - 6363'
        ]);

        // Operator
        User::create([
            'avatar' => '1720847855-operator.jpg',
            'username' => 'operator',
            'name' => 'Operator',
            'email' => 'operator@test.com',
            'password' => bcrypt('password'),
            'role' => 'Operator',
            'phone_number' => '0829 - 2332 - 2100'
        ]);
        User::create([
            'avatar' => '1720521277-alvaokaaa.jpg',
            'username' => 'alvaokaaa',
            'name' => 'Alvonda Oka Fahrezi',
            'email' => 'okaaa0909@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Operator',
            'phone_number' => '0895 - 1269 - 4308'
        ]);
    }
}
