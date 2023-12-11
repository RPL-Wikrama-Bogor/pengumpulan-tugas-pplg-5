<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id(); //menyimpan primary key ai dengan nama id
            $table->string('name');
            $table->enum('type',['tablet','sirup','kapsul']);
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps(); //membuat dua column : created_at (tgl data dibuat) update_at(tgl data di update)
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
