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
            $table->id();
            $table->string('name');
            $table->enum('type', ['tablet', 'sirup', 'kapsul']);
            $table->integer('price');
            $table->integer('stocks');
            $table->timestamps(); //membuat 2 colum: created_at (tgl data dibuat) & updated_at (tgl data di update)
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
