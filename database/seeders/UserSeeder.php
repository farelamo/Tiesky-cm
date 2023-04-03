<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Tiesky',
            'email'    => 'admin-tiesky@gmail.com',
            'password' => bcrypt('rahasia'),
        ]);
    }
}
