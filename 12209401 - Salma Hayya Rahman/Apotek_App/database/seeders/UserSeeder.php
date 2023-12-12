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
     *
     * @return void
     */
    public function run(): void
    {
        user::create([
            //column table db => value
            'name' => 'Administrator',
            'email' => 'apotek_admin@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'admin' , 
        ]) ;
        user::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasirapotek'),
            'role' => 'kasir' , 
        ]) ;
    }
}
