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
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' =>'Adrimistator',
            'email'=> 'apotek_admin@gmail.com',
            'role' =>'admin',
            'password'=> Hash::make('adminapotek'),
        ]);
        User::create([
            'name' =>'Kasir',
            'email'=> 'kasir@gmail.com',
            'role' =>"kasir",
            'password'=> Hash::make('kasirapotek'),
        ]);
    }
}
