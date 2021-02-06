<?php

namespace App\View\Components\Region;

use App\Models\Region;
use Illuminate\View\Component;

class RegionObject extends Component
{
    public $region;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.region.region-object');
    }
}