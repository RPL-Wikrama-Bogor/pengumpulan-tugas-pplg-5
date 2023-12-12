<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        "user_id",
        "medicines",
        "total_price",
        "nama_customer",
    ];
    //penegasan ulang tipe data, biasanya di gunakan untuk tipe data yang tidak tersedia di migration seperti array yang hanya tersedia json saja di migrationnya
    protected $casts = [
        "medicines"=> "array",

    ];
    public function user(){
        //sebagai FK cukup panggil belongsTO : mengaitkan
        return $this->belongsTO(User::class);
    }
}
