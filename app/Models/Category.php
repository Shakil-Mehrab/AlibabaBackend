<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Kalnoy\Nestedset\NodeTrait;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\HasChildren;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,NodeTrait,HasChildren,CanBeScoped;

    protected $fillable = [
        'parent_id',
        'name',
        'icon',
        'slug',
        'order',
        'live',
    ];

    public static function booted()
    {
        static::creating(function (Category $category) {
            $category->uuid = Str::uuid();
        });
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

    /**
     * scopeIsLive
     *
     * @param  mixed $builder
     * @return void
     */
    public function scopeIsLive(Builder $builder)
    {
        $builder->where('live', true);
    }

    /**
     * scopeParents
     *
     * @param  mixed $builder
     * @return void
     */
    // public function scopeParents(Builder $builder)
    // {
    //     $builder->whereNull('parent_id');
    // }

    /**
     * children
     *
     * @return void
     */
    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }

    /**
     * author
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * getAvatarUrl
     *
     * @return void
     */
    public function getAvatarUrl()
    {
        if (!$this->avatar) {
            return 'https://ui-avatars.com/api/?name='. $this->name .'&format=svg&rounded=true&color=7F9CF5&background=EBF4FF';
        }

        return $this->avatar;
    }

    /**
     * articles
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
