<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * booted
     *
     * @return void
     */
    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
