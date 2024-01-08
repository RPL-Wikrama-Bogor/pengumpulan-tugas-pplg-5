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
        //element model tambah data
        User::create([
            //column tabe db=>value
            'name'=>"Administrator",
            'email'=>"admin@gmail.com",
            'role'=>"admin",
            "password"=>Hash::make("adminapotek"),
            //cara lain enkripsi: bcrypt
        ]);

        User::create([
            //column tabel db=>value
            'name'=>"Kasir",
            'email'=>"kasir@gmail.com",
            'role'=>"kasir",
            "password"=>Hash::make("kasirapotek"),
        ]);
    }
}
