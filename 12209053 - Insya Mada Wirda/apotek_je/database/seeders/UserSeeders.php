<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            //colum table db=> value
            'name' => 'Administrator',
            'email' => 'Apotek_admin@gmail.com',
            'password' => Hash::make('adminapotek'),
            //cara lain enkripsi : bcrypt
            'role' => 'admin',
        ]);
        user::create([
            'name' => 'Kasir',
            'email' => 'Kasir@gmail.com',
            'password' => Hash::make('kasirapotek'),
            'role' => 'kasir',
        ]);
    }
}
