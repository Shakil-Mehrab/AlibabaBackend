<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function edit(Product $product)
    {
        return view('product.edit', [
            'article' => $product
        ]);
    }
}