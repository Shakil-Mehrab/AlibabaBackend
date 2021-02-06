<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use App\Bag\Articles\ArticleStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'slug',
        'title',
        'kicker',
        'body',
        'top',
        'status',
        'viewers',
        'publisher_id',
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'deleted_at', 'published_at'
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
        static::creating(function (Article $article) {
            $article->uuid = Str::uuid();
            $article->slug = Str::uuid();
            $article->status = ArticleStatus::PENDING;
        });
    }

    public function toSearchableArray()
    {
        return [
             'id' => $this->id,
             'title' => $this->title,
             'body' => $this->body
        ];
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
     * publisher
     *
     * @return void
     */
    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    /**
     * categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category')
            ->withTimestamps();
    }

    /**
     * topics
     *
     * @return void
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'article_topic')
            ->withTimestamps();
    }

    /**
     * tags
     *
     * @return void
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag')
            ->withTimestamps();
    }

    /**
     * regions
     *
     * @return void
     */
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'article_region')
            ->withTimestamps();
    }
}
