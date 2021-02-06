<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }
}
