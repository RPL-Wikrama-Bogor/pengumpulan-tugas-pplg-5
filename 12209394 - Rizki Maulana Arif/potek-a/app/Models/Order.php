<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

public function user() :BelongsTo
{
    //sebagai fk cukup panggil belongsTo :mengaitkan
    return $this->belongsTo(User::class);
}
}
