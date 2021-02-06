<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name', 'slug', 'live',
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
     * boot
     *
     * @return void
     */
    public static function booted()
    {
        static::creating(function (Topic $topic) {
            $topic->uuid = Str::uuid();
        });
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_topic');
    }
}