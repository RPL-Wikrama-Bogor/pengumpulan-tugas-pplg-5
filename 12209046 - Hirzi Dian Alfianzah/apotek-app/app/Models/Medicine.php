<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //mendifinisikan colum apa saja yang bisa diisi(seluruh colum selain id dan timestamps: karena unutk pengisian colum2 itu telah defoult/auto oleh  sistem)
    protected $fillable =[
        'name',
        'type',
        'price',
        'stock'
    ];
    }


