<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // eloquent model tambah data
        User::create([
            // colum table db => value
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('adminapotek'),
        ]);

        User::create([
            // colum table db => value
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'password' => Hash::make('kasirapotek'),
        ]);
    }
}
