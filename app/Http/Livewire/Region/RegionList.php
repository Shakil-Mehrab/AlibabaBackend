<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class RegionList extends Component
{
    use WithPagination;

    public $paginate;

    public function mount($paginate = 24)
    {
        $this->paginate = $paginate;
    }

    public function regions()
    {
        return Region::get()->toTree();
    }

    public function render()
    {
        return view('livewire.region.region-list');
    }
}