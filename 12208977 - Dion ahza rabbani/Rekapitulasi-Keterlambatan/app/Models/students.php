<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class students extends Model
{
    use HasFactory;

    protected $table ='students';
    protected $primaryKey='id';
    protected $fillable=[
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
    ];

    // Eloquent Event to generate UUID before creating a new record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
}
