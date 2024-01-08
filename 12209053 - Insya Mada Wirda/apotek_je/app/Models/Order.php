<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "medicinies",
        "total_price",
        "name_costumer",
    ];

    //penegasan ulang tipe data, biasanya digunakan untuk tipe data tersedia di migration seperti array yang hanya tersedia json saja di migrationnya

    protected $casts = [
        "medicinies" => "array",
    ];

    public function user()
    {
        //sebagai FK cukup memanggil belongsTo : mengetikan
        return $this->belongsTo
        (User::class);
    }
}