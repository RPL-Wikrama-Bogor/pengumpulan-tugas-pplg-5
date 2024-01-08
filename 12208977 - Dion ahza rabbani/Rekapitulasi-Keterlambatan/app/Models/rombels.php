<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombels extends Model
{
    use HasFactory;

    protected $table = "rombels";
    protected $primarykey = "id";
    protected $fillable = [
        'rombel',
    ];
}
