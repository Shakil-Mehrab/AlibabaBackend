<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoryResource;

class ProductIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'uuid'=>$this->uuid,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'short_description'=>$this->short_description,
            'description'=>$this->description,
            'status'=>$this->status,
            'thumbnail'=>$this->thumbnail,
            'user_id'=>new UserResource($this->user),
            'category'=>CategoryResource::collection($this->categories),
            'price'=>$this->price,
            // 'stock_count'=>$this->stockCount(),
            'created_at'=>$this->created_at->toDateTimeString(),
        ];
    }
}
