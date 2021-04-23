<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'password' => Hash::make('admin123')],
            ['name' => 'Admin2', 'email' => 'admin2@mail.com', 'password' => Hash::make('admin123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
