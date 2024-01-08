<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Eloment model tambah data
        User::create([
            //colim table db => value
            'name' => "Administator",
            'email' => "admin@gmail.com",
            'role' => "admin",
            'password' => Hash::make("adminapotek"),   //Hash = untuk mengubah password mencadi campuran angka dan huruf (supaya tidak bisa di liat )
        ]);

        User::create([
            //column table db => value
            'name' => 'kasir',
            'email' => "kasir@gmail.com",
            'role' => "kasir",
            'password' => Hash::make("Kasir apotek"),  //Hash = untuk mengubah password mencadi campuran angka dan huruf (supaya tidak bisa di liat )
        ]);
    }
}
