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
        $now = Carbon::now();
        $users = [
            [
                'name' => 'Earl',
                'email' => 'earl@pho.com',
                'password' => 'changepassword',
            ],
            [
                'name' => 'Arjay',
                'email' => 'arjay@ebmc.com',
                'password' => 'changepassword',
            ],
            [
                'name' => 'anthony',
                'email' => 'anthony@ebmc.com',
                'password' => 'changepassword',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
