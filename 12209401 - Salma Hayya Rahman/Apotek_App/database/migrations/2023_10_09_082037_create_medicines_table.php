<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id(); //menyimpan primary key AI dengan nama id
            $table->string('name') ;
            $table->enum('type' , ['tablet' , 'sirup' , 'kapsul']);
            $table->integer('price') ;
            $table->integer('stock') ;
            $table->timestamps(); //membuat dua column : created_at (tgl data dibuat) & updated_at (tgl data diupdate)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
};
