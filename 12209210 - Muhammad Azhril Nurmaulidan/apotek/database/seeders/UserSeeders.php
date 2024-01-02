<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\user;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //eloquent model tambahan
        User::create([
            'name' => 'administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('administrator')
        ]);
        User::create([
            // colom table db => value
            'name' => "Kasir",
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            "password" => Hash::make("kasirapotek"),
    ]);
    }
}
