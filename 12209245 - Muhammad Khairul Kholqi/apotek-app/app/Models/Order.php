<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'orders';

    protected $fillable = [
        "user_id",
        "medicines",
        "total_price",
        "name_customer",
    ];

    // penegasan ulan tipe data biasanya di gunakan untuk tipe data yang tidak tersedia di mgration seperti array yg hanya tersedia di json saja di migrationnya

    protected $casts = [
        "medicines" => "array",
    ];

    public function user() {
        // sebagai fk cukup panggil belongsIo : mengaitkan
        return $this->belongsTo(User::class);
    }
}
