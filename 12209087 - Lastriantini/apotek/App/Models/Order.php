<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   
    //opsional untuk mencari nama table nya (otomatis)
    protected $table = 'orders';

    //wajib
    protected $fillable = [
        "user_id",
        "medicines",
        "total_price",
        "name_customer",
    ];

    //penegasan ulang tioe data, (opsional)
    //biasa digunakan untuk tipe data yang tdk tersedia di migration seperti array hanya json

    protected $casts = [
        "medicines" => "array",
    ];

    public function user() 
    {
        //sebagai FK cukup panggil belongsTo : mengaitkan
        return $this->belongsTo(User::class);
    }

}
