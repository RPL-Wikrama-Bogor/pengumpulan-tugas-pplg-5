<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    // definisi colom apa saja yang bisa diisi oleh user
    protected $fillable = [
        'name',
        'type',
        'stock',
        'price',
    ];
}
