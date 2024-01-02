<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrator",
            'email' => "admin@example.com",
            'role' => 'admin',
            'password' => Hash::make("adminapotek"),
        ]);
        User::create([
            'name' => "Kasir",
            'email' => "kasir@example.com",
            'role' => 'kasir',
            'password' => Hash::make("kasirapotek")        ]);
    }
}



