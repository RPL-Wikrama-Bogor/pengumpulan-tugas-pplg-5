<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //medefinisikan column apa saja yang bisa diisi oleh user (seluruh column selain id dan timestaps: kerena untuk pengisian column2 itu telah default/ auto oleh sistem)
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'stock',
        'price',
    ];
}
