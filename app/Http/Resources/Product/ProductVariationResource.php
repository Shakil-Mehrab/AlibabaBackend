<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            // 'price'=>$this->formattedPrice,
            'thumbnail'=>$this->thumbnail,
            // 'price_varies'=>$this->priceVaries(),
            // 'stock_count'=>(int)$this->stockCount(),
            // 'type'=>$this->type->name,
            // 'in_stock'=>$this->inStock(),
            // 'product'=>new ProductIndexResource($this->product),
        ];
    }
}