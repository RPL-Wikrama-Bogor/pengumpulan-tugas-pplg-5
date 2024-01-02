<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class students extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'nis',
        'name',
        'rombel_id',
        'rayon_id',

    ];

    public function lates() {
        return $this->hasMany(students::class);
    } 

    public function rombels(){
        return $this->belongsTo(rombels::class , 'rombel_id', 'rombel');
    }
    
    public function rayons(){
        return $this->belongsTo(rayons::class, 'rayon_id', 'rayon');
    }
}
