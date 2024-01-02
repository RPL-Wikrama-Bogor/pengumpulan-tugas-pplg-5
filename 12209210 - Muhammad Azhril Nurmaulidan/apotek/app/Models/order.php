<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'medicines',
        'total_price',
        'name_customer',
    ];
    //penegasan ulang tipe data , biasanya digunakan untuk tipe data yang tidak tersedia di migration
    //seperti array yg hanya tersedia json saja di migration
    protected $casts = [
        'medicines' => 'array',
    ];
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
