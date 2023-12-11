<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //untuk menjalankan sekaligus 
        $this->call(UserSeeders::class);
        $this->call(MedicineSeeders::class);
    }
}
