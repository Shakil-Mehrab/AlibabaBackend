<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'path'
    ];

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

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

        static::deleting(function ($model) {
            Storage::disk('public')->delete($model->path);
        });
    }

    /**
     * sizeForHumans
     *
     * @return void
     */
    public function sizeForHumans()
    {
        $bytes = $this->size;

        $units = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

        for ($i=0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . $units[$i];
    }
}