<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
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
    public function products()
    {
        return Product::latest()->paginate($this->paginate);
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.product.table');
    }
}
