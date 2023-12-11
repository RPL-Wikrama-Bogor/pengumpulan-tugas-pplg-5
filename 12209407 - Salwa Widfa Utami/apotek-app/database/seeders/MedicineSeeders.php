<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\medicine;

class MedicineSeeders extends Seeder
{
    medicine::create([
        "name" => "vit d",
        "type" => "kapsul",
        "price" => 7000,
        "stock" => 34
    ]);
}
