<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Emil Sadekin Islam',
                'username' => 'neelemil',
                'phone' => '01732547755',
                'email' => 'nilemil007@gmail.com',
                'role' => 'super-admin',
                'password' => '32133213',
            ]
        ];

        User::insert( $users );
    }
}
