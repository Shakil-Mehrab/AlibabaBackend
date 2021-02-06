<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'caption',
        'description',
        'disk',
        'mime_type',
        'size',
        'path',
    ];

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
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
            $model->slug = Str::uuid();
        });

        static::deleting(function ($model) {
            Storage::disk($model->disk)->delete($model->path);
        });
    }

    /**
     * getMediaLink
     *
     * @return void
     */
    public function getMediaLink()
    {
        // dump(url($this->path));
        return Storage::disk($this->disk)->url($this->path);
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
