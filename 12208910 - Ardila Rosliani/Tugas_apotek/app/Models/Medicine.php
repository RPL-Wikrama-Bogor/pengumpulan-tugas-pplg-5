<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    //mendefinisikan coloum apa saja yang bisa diisi oleh user (seluruh coloum selain id dan timestamps(created dan updated): karena untuk pengisian coloumn itu telah default / auto oleh sistem)
    protected $fillable = [
        'name',
        'type',
        'stock',
        'price',
    ];
}
