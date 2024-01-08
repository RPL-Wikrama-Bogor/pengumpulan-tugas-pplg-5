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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); //menyimpan primary key AI dengan nama id
            $table->bigInteger('user_id'); //relasi atau FK untuk tipe data integer gunakan bigInteger
            $table->string('nama_customer');
            $table->integer('total_price');
            $table->json('medicines');
            $table->timestamps();//membuat dua column : created_at(tgl data dibuat) & updated_at (tgl data diupdate)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
