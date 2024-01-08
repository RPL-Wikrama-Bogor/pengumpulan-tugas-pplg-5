<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // eloquent model tambah data
        User::create([
            // column table db => value
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek"),
            // hash : dienskripsi agar tidak bisa dilihat oleh siapapun, selain hash (bcrypt)
        ]);
        User::create([
            // column table db => value
            'name' => "Kasir",
            'email' => "kasir@gmail.com",
            'role' => "cashier",
            "password" => Hash::make("kasirapotek"),
        ]);
    }
}
