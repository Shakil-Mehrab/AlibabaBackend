<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagList extends Component
{
    use WithPagination;

    public $paginate;

    public function mount($paginate = 24)
    {
        $this->paginate = $paginate;
    }

    public function tags()
    {
        return Tag::latest()->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.tag.tag-list');
    }
}