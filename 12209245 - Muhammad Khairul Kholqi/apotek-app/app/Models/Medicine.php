<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    // mendefinisikan colum apa saja yang bisa diisin oleh user (seluruh colum selain id dan timestamps: karena untuk pengisian colum colum itu telah default auto oleh sistem)

    protected $fillable = [
        'name',
        'type',
        'stocks',
        'price',
    ];
}
