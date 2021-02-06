<?php

namespace App\Http\Controllers\Topic;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index()
    {
        return view('topic.index');
    }

    public function create()
    {
        return view('topic.create');
    }

    public function edit(Topic $topic)
    {
        return view('topic.edit', [
            'topic' => $topic
        ]);
    }
}