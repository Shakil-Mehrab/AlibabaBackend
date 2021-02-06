<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public function categories()
    {
        return Category::latest()->get();
    }

    public function render()
    {
        return view('livewire.category.category-list');
    }
}