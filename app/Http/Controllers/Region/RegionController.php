<?php

namespace App\Http\Controllers\Region;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function index()
    {
        return view('region.index');
    }

    public function create()
    {
        return view('region.create');
    }

    public function edit(Region $region)
    {
        return view('region.edit', [
            'region' => $region
        ]);
    }
}