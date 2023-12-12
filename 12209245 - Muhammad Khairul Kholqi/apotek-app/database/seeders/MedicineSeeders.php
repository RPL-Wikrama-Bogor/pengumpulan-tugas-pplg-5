<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Medicine;

class MedicineSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'name' => 'Bodrex',
            'type' => 'Tablet',
            'price' => 2000,
            'stocks' => 200
        ]);
        Medicine::create([
            'name' => 'Panadol',
            'type' => 'Tablet',
            'price' => 3000,
            'stocks' => 100
        ]);
    }
}
