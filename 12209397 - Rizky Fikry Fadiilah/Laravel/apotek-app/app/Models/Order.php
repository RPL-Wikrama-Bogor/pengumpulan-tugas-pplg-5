<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // agar tahu diarahkan table ke mana
    // protected $table = 'orders';

    protected $fillable = [
        "user_id",
        "medicine",
        "total_price",
        "name_customer",
    ];
    // penegasan ulang tipe data, karena json 
    protected $casts = [
        "medicine" => "array",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
