<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use ReflectionClass;
use App\Models\Topic;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class DatatableController extends Controller
{
    public function articles()
    {
        return view('datatable.articles', [
            'model' => $this->getModelPath(Article::class)
        ]);
    }
    public function products()
    {
        return view('datatable.products', [
            'model' => $this->getModelPath(Product::class)
        ]);
    }

    public function categories()
    {
        return view('datatable.categories', [
            'model' => $this->getModelPath(Category::class)
        ]);
    }

    public function topics()
    {
        return view('datatable.topics', [
            'model' => $this->getModelPath(Topic::class)
        ]);
    }

    public function tags()
    {
        return view('datatable.tags', [
            'model' => $this->getModelPath(Tag::class)
        ]);
    }

    protected function getModelPath($model)
    {
        $reflection  = new ReflectionClass($model);

        return $reflection->name;
    }
}