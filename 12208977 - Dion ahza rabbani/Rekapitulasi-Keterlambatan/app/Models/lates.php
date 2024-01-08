<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lates extends Model
{
    use HasFactory;
    
    protected $table = "lates";
    protected $primarykey = "id";
    protected $fillable = [
        'name_id',
        'information',
        'date_time_late',
        'bukti',
        
    ];
}
