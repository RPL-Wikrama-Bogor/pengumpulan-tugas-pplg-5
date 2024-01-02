<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeders extends Seeder
{
    //eloquent model tambah data
    User::create([
        //  column => value
        'name' => "Administrator",
        'email' => "admin@gmail.com",
        'role' => "admin",
        "password" => Hash::make("adminapotek"),
        // cara lain enkripsi bcypt

    ]);
    
    User::create([
        //  column => value
        'name' => "Kasir",
        'email' => "kasir@gmail.com",
        'role' => "kasir",
        "password" => Hash::make("kasirapotek"),
    ]);
}
