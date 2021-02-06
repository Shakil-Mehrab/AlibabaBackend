<?php

namespace App\Scoping\Scopes;

use akr4m\scoping\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class  CategoryScope implements Scope
{

    public function apply(Builder $builder,$value){
        return $builder->whereHas('categories',function($builder) use ($value){
            $builder->where('slug',$value);
        });
    }
}
