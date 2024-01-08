<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayons extends Model
{
    use HasFactory;
    protected $table = 'rayons';
    protected $primarykey = 'id';
    protected $fillable = [
        'rayon',
        'user_id',
    ];
    
}
