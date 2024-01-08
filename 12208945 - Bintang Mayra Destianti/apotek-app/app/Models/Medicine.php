<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //mendefinisikan column apa saja yan bisa diisi 
    // (seluruh coloumn selain id dan timestamps:karena untuk pengisina column2 itu telah difault/auto oleh sistem)
    protected $fillable =[
        'name',
        'type',
        'stock',
        'price',
    ];

}
