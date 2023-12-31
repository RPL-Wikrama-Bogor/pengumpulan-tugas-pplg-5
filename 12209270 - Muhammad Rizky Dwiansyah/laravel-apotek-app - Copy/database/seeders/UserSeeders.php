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
     *
     * 
     */
    public function run(): void
{
        //
        User::create([
            //colun table db => value
            'nama' => "Administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek"),
        ]);
        User::create([
            //colun table db => value
            'nama' =>"Kasir",
            'email' => "kasir@gmail.com",
            'role' => "cashier",
            "password" => Hash::make("kasirapotek"),
        ]);
   }
}