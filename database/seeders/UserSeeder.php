<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'other',
                'birthdate' => Carbon::now()->subYears(30),
                'role_id' => 1, // admin
                'socialmedia_id' => 1,
            ],
            [
                'name' => 'John Smith',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'male',
                'birthdate' => Carbon::now()->subYears(25),
                'role_id' => 2,
                'socialmedia_id' => 2,
            ],
            [
                'name' => 'Emma Johnson',
                'email' => 'emma@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'female',
                'birthdate' => Carbon::now()->subYears(28),
                'role_id' => 3,
                'socialmedia_id' => 3,
            ],
            [
                'name' => 'Alex Chen',
                'email' => 'alex@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'other',
                'birthdate' => Carbon::now()->subYears(22),
                'role_id' => 3,
                'socialmedia_id' => 4,
            ],
            [
                'name' => 'Sarah Williams',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'female',
                'birthdate' => Carbon::now()->subYears(35),
                'role_id' => 3,
                'socialmedia_id' => 5,
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'male',
                'birthdate' => Carbon::now()->subYears(40),
                'role_id' => 2,
                'socialmedia_id' => 6,
            ],
            [
                'name' => 'Jessica Lee',
                'email' => 'jessica@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'female',
                'birthdate' => Carbon::now()->subYears(19),
                'role_id' => 2,
                'socialmedia_id' => 7,
            ],
            [
                'name' => 'David Kim',
                'email' => 'david@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'male',
                'birthdate' => Carbon::now()->subYears(32),
                'role_id' => 2,
                'socialmedia_id' => 8,
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'female',
                'birthdate' => Carbon::now()->subYears(27),
                'role_id' => 2,
                'socialmedia_id' => 9,
            ],
            [
                'name' => 'James Wilson',
                'email' => 'james@example.com',
                'password' => Hash::make('password123'),
                'gender' => 'male',
                'birthdate' => Carbon::now()->subYears(45),
                'role_id' => 2,
                'socialmedia_id' => 10,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
