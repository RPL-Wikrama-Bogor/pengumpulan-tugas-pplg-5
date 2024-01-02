<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     */
    public function run(): void
    {
        Medicine::create([
            'name' => "Vitamin D",
            'type' => "tablet",
            'stock' => 20,
            'price' => 8000,
        ]);
    }
}