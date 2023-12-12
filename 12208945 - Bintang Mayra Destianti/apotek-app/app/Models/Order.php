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
    //penegasan ulang tipe data,biasanya digunakan untuk 
//tipe data yang tidak tersedia di migration seperti array yng haya tersedia json sajadi migrationsny
protected $casts = [
    "medicines" => "array",
];

public function user()
{
    //sebagai fk cukup panggil belongsTo :mengaitkan
    return $this->belongsTo(User::class);
}
}
