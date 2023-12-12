<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('adminapotek')
        ]);
        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'password' => Hash::make('kasirapotek')
        ]);
    }
}
