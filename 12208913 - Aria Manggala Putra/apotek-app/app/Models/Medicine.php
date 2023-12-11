<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    // mendifinisikan column apa saja yang bisa diisi oleh user (seluruh coloumn selain id dan timestamps: karena untuk pengisian column2 itu telah default/auto oleh sistem)

    protected $fillable= [
        'name',
        'type',
        'stock',
        'price',
    ];
}
