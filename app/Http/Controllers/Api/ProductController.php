<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scoping\Scopes\CategoryScope;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductIndexResource;

class ProductController extends Controller
{

    public function index(Request $request){
        dd(request('category'));
        $products=Product::latest()
            ->withScopes(
                $this->scopes()
            )
            ->shakil(request('per-page'));

        return ProductIndexResource::collection(
            $products
        );
    }
    public function show(Product $product){
        // return $product;
        return new ProductResource(
            $product
        );
    }
    protected function scopes()
    {
        return [
            'categories' => new CategoryScope(),
        ];
    }
}
