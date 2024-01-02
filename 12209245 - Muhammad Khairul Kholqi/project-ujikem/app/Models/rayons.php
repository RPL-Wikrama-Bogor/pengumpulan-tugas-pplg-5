<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class rayons extends Model
{
    use HasFactory;

    protected $fillable = [
    'rayon',
    'user_id',
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
