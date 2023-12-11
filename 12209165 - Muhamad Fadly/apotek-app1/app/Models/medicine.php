<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    use HasFactory;


    //mendevisikan culom apa saj yang bisa di isi oleh user (seluruh column selain id dan timstamps:kearen untunk mengisai colum2 itu terlalu defult auto oleh sistem)
    protected $fillable = ['name','type','price','stock'];
}
