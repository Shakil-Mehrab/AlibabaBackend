<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Obj extends Model
{
    use HasFactory, HasRecursiveRelationships, Searchable;

    public $table = 'objects';

    protected $fillable = [
        'user_id',
        'parent_id',
    ];

    /**
     * toSearchableArray
     *
     * @return void
     */
    public function toSearchableArray() {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->objectable->name,
            'path' => $this->ancestorsAndSelf->pluck('objectable.name')->reverse()->join('/'),
        ];
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
            optional($model->objectable)->delete();
            $model->descendants->each->delete();
        });
    }

    /**
     * objectable
     *
     * @return void
     */
    public function objectable()
    {
        return $this->morphTo();
    }
}
