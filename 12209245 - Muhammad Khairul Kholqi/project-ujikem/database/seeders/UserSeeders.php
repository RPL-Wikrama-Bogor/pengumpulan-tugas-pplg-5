<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'Pembimbing',
            'email' => 'pembimbing@gmail.com',
            'role' => 'ps',
            'password' => Hash::make('pswk')
        ]);
    }
}
