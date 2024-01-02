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
            $table->id(); // menyimpan primary key Ai dengan nama id
            $table->string('name');
            $table->enum('type',['tablet', 'sirup', 'capsul']);
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps(); //membuat dua colum : created_at(tgl data dibuat) & updated_at (tgl data di update)
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
