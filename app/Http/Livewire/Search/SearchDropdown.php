<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Region;

class SearchDropdown extends Component
{
    public $model;

    public $query = '';

    public $searResults = [];

    public function records()
    {
        $builder = new Region;

        if ($this->query) {
            $builder = $builder->search($this->query);
        }

        return $builder->get();
    }

    // public function builder()
    // {
    //     return new $this->model;
    // }

    public function render()
    {
        return view('livewire.search.search-dropdown');
    }
}