<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index');
    }

    public function create()
    {
        return view('tag.create');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', [
            'tag' => $tag
        ]);
    }
}