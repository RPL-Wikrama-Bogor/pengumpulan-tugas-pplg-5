<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;


class MedicinesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            //colum table db => value
            'name' => "administrator",
            'type' => "admin@gmail.com",
            'price' => "admin",
            'stock' => "adminapotek",
            //cara lain ekpripsi : bcyrpt


        ]);
    }
}
