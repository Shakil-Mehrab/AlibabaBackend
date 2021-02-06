<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $paginate;

    public function mount($paginate = 20)
    {
        $this->paginate = $paginate;
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return Article::latest()->paginate($this->paginate);
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.article.table');
    }
}
