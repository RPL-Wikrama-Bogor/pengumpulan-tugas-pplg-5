<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'medicines',
        'total_price',
        'name_customer',
    ];

    protected $casts = [
        'medicine' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo
        (User::class);
    }
}
