<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //eloquent model tambah data
        User::create([
            //  column => value
            'name' => "Administrator2",
            'email' => "admin2@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek"),
            // cara lain enkripsi bcypt

        ]);
        User::create([
            //  column => value
            'name' => "Kasir2",
            'email' => "kasir2@gmail.com",
            'role' => "kasir",
            "password" => Hash::make("kasirapotek"),
        ]);
    }
}
