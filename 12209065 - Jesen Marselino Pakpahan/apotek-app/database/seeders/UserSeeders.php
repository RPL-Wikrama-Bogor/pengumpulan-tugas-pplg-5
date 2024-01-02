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
        //
        User::create([
            'name' =>
            "Administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek"),
            //cara lain enkripsi

        ]);
        
        User::create([
            'name' => "kasir",
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            "password" => Hash::make("kasirapotek"),
        ]);
    }
}