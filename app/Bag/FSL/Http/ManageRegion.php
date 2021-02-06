<?php

namespace App\Bag\FSL\Http;

use App\Models\Region;
use App\Bag\FSL\Contracts\ManageRegions;
use Illuminate\Support\Facades\Validator;

class ManageRegion implements ManageRegions
{
    /**
     * create
     *
     * @param  mixed $input
     * @return void
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:regions,slug'],
            'parent_id' => ['nullable'],
            'lat' => ['nullable'],
            'lng' => ['nullable'],
        ])->validate();

        Region::create([
            'name' => optional($input)['name'],
            'slug' => optional($input)['slug'],
            'parent_id' => optional($input)['parent_id'],
            'lat' => optional($input)['lat'],
            'lng' => optional($input)['lng'],
        ]);
    }

    /**
     * update
     *
     * @param  mixed $region
     * @param  mixed $input
     * @return void
     */
    public function update($region, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:regions,slug,' . $region->id],
            'parent_id' => ['nullable'],
            'lat' => ['nullable'],
            'lng' => ['nullable'],
        ])->validate();

        $region->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'parent_id' => $input['parent_id'],
            'lat' => optional($input)['lat'],
            'lng' => optional($input)['lng'],
        ])->save();
    }

    /**
     * delete
     *
     * @param  mixed $region
     * @return void
     */
    public function delete($region)
    {

    }
}
