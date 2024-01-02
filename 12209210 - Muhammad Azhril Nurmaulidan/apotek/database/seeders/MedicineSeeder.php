<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\medicine;
use Illuminate\Support\Facades\Hash;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'name' => 'vitamin D',
            'type' => 'sirup',
            'price' => '20000',
            'stock' => '10',
        ]);
    }
}
