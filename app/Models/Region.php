<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory, NodeTrait, Searchable;

    use Searchable {
        Searchable::usesSoftDelete insteadof NodeTrait;
    }

    protected $fillable = [
        'name',
        'uuid',
        'slug',
        'eng_name',
        'parent_id',
        'order',
        'lat',
        'lng'
    ];

    /**
     * booted
     *
     * @return void
     */
    public static function booted()
    {
        static::creating(function (Model $model) {
            $model->uuid = Str::uuid();
            $model->eng_name = $model->slug;

            $prefix = $model->parent ? $model->parent->slug . ' ' : '';
            $model->slug = Str::slug($prefix . $model->slug);
        });
    }

    public function getScoutKey()
    {
        return $this->slug;
    }

    public function toSearchableArray() {
        return [
            'id' => $this->id,
            'slug' => $this->eng_name,
            'name' => $this->name,
            'parent_id' => $this->parent_id,
        ];
    }

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function scopeParents(Builder $builder)
    // {
    //     $builder->whereNull('parent_id');
    // }

    // public function parent()
    // {
    //     return $this->hasMany(Region::class, 'id', 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Region::class, 'parent_id', 'id');
    // }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_region')
            ->withTimestamps();
    }
}