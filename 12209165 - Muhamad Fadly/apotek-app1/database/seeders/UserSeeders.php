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
        User::create([
            //colum table db => value
            'name' => "administrator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            "password" => Hash::make("adminapotek"),
            //cara lain ekpripsi : bcyrpt


        ]);
        User::create([
            'name' => "tarto",
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            "password" => Hash::make("kasirapotek"),


        ]);
    }
}
