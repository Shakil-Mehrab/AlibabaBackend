<?php

namespace App\Http\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class TopicList extends Component
{
    use WithPagination;

    public $paginate;

    public function mount($paginate = 24)
    {
        $this->paginate = $paginate;
    }

    public function topics()
    {
        return Topic::latest()->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.topic.topic-list');
    }
}