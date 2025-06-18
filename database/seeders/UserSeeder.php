<?php

namespace Database\Seeders;

use App\Enums\TypeUser;
use App\Enums\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'demo',
                'email' => 'dainq.user@gmail.com',
                'password' => Hash::make('123456'),
                'username' => 'dainq.user',
                'phone' => '0983883883',
                'address' => 'HAIPHONG',
                'about' => '',
                'status' => UserStatus::ACTIVE,
            ],
            [
                'full_name' => 'demo',
                'email' => 'dainq.moderator@gmail.com',
                'password' => Hash::make('123456'),
                'username' => 'dainq.moderator',
                'phone' => '0986886886',
                'address' => 'HANOI',
                'about' => '',
                'status' => UserStatus::ACTIVE,
            ],
            [
                'full_name' => 'demo',
                'email' => 'dainq.admin@gmail.com',
                'password' => Hash::make('123456'),
                'username' => 'dainq.admin',
                'phone' => '0989889889',
                'address' => 'HANOI',
                'about' => '',
                'status' => UserStatus::ACTIVE,
            ]

        ];
        DB::table('users')->insert($users);
    }
}
