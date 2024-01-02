<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //mendefinisikan column apa saja yang bisa diisi 
    //(seluruh column selain id dan timestamp: karena untuk pengisian column2 itu telah defeult/sistem)
    protected $fillable = [
        'name',
        'price',
        'stock',
        'price,'
    ];
}
