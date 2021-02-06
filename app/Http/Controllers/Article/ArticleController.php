<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    public function create()
    {
        return view('article.create');
    }

    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }
}