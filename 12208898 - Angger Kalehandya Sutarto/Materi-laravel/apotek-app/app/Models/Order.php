<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_customer',
        'total_price',
        'medicines'
    ];

    // penegasan ulang tipe data, biasanya digunakan untuk tipe data yang tidak 
    // tersedia di migration seperti array yang hanya tersedia json saja di migrationnya

    protected $casts = [
        'medicines' => 'array',
    ];

    public function user() {
        // sebagai FK cukup panggil belongsTo: mengaitkan
        return $this->belongsTo(User::class);
    }
}
