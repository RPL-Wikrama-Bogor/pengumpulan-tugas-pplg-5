<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // elquent model tambah data
        User::create([
            'name' => "Administrator",
            'email' => "Administrator@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek")
        ]);
        User::create([
            'name' => "Kasir",
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            "password" => Hash::make("kasirapotek")
        ]);
    }
}
