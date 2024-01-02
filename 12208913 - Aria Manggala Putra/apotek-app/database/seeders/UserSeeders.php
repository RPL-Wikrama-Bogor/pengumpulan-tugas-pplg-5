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
     * @return void
     */
    public function run()
    {
        //coloumn table db => value
        User::create([
            'name' => 'administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make
            ("adminapotek"),
        ]);
        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'password' => Hash::make
            ("kasirapotek"),
        ]);

    }
}
