<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    //mendefinisikan column apa saja yang bisa diisi(seluruh clumn selain id dan timestamps: karena untuk pengisian column'  itu telah default/auto oleh sistem)

    protected $fillable = [
      'name',
      'type',
      'stock',
      'price',
    ];

    
}
