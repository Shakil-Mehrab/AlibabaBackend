<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scoping\Scopes\SelectedCategoryScope;
use App\Http\Resources\Category\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::with('children','children.children')
                    ->withScopes(
                        $this->scopes()
                    )
                    ->parents()
                    ->get();
        return CategoryResource::collection($categories);
    }


    protected function scopes()
    {
        return [
            'selects' => new SelectedCategoryScope(),
        ];
    }
}
