<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use App\Models\Traits\HasPrice;
use App\Bag\Product\ProductStatus;
use App\Models\Traits\CanBeScoped;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable, CanBeScoped;
    protected $fillable = [
        'name',
        'slug',
        'top',
        'order',
        'short_description',
        'description',
        'status',
        'viewers',
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
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
    public static function booted()
    {
        static::creating(function (Product $article) {
            $article->uuid = Str::uuid();
            $article->status = ProductStatus::PENDING;
        });
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    public function scopePagination($query, $per_page = 12)
    {
        return $query->paginate($per_page);
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
     * categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category')
            ->withTimestamps();
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }
    public function stockCount()
    {
        return $this->variations   //1kg 300ti,2kg er 200ti
            ->sum(function ($variation) {  //eta ki foreach er moto
                return $variation->stockCount();
            });
    }
}
