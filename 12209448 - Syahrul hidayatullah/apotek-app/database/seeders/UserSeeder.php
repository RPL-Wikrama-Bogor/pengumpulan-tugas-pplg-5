<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            'password' => hash::make("adminapotek"),
        ]);

        user::create([
            'name' => "kasir",
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            'password' => hash::make("kasirapotek"),
        ]);

    }
}
