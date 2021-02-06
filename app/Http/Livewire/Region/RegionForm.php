<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;
use App\Bag\FSL\Contracts\ManageRegions;

class RegionForm extends Component
{
    public $region;

    public $state = [];

    public $parents;

    public function mount(Region $region)
    {
        $this->state = $region->withoutRelations()->toArray();
        $this->parents = Region::get()->except(optional($this->region)->id)->toFlatTree();
    }

    protected $listeners = ['postAdded'];

    public function postAdded()
    {
        dd('acb');
    }

    public function store(ManageRegions $manager)
    {
        if ($this->region) {
            $manager->update(
                $this->region,
                $this->state
            );
            $this->emit('saved');

            return;
        }

        $manager->create(
            $this->state
        );
        $this->state = [];

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.region.region-form');
    }
}