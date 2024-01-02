<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\medicine;

class MedicineSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        medicine::create([
            "name" => "vit d",
            "type" => "kapsul",
            "price" => 7000,
            "stock" => 34
        ]);
    }
}
