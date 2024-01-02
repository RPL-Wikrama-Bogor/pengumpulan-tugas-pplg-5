<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "medicines",
        "total_price",
        "name_customer",
        // "created_at"
    ];
    // penengsan ulang tiap data ,biasanya di gunakan untuk tipe data yang tidak tersedia di migration seperti array yang hanya tersedia json saja di migration
    protected $casts = ["medicines"=>'array'];

    public function user(){
        //sebagai fk cukup memangil belongsTO : mengaiktakn
        return $this->belongsTo(User::class);
    }
    
}
