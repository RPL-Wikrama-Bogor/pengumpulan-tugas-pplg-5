<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // elemets model untuk tambah
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasirapotek'),
            'role' => 'kasir',
        ]);
        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'admin1@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'role' => 'admin',
        // ]);
        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'kasir1@gmail.com',
        //     'password' => Hash::make('kasir'),
        //     'role' => 'admin',
        // ]);
    }
}
