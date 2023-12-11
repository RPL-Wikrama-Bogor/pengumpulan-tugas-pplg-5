<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //mendefinisikan cokumn apa saja yang diisi oleh user (seluruh colomn selainn id dan timestamps: karena untuk pengisian column2 itu telah default/autp oleh sistem)
    protected $fillable = [
        'name',
        'type',
        'stock',
        'price',
    ];
}
