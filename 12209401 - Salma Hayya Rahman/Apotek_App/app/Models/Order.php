<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "medicines",
        "total_price",
        "name_customer",
    ];

    //penegasan ulang tipe data, biasanya digunakan untuk tpe data yg tdk tersedia
    //di migration seperti array yg hanya tersedia json saja dimigrationnya
    protected $casts = [
        "medicines" => "array",
    ];

    public function user()
    {
        //sebagai FK cukup panggil belongsTo : mengaitkan
        return $this->belongsTo
        (User::class);
    }
}