<?php

namespace App\Bag\FSL\Http;

use App\Bag\FSL\Contracts\ManageTags;
use Illuminate\Support\Facades\Validator;

class ManageTag implements ManageTags
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
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug'],
        ])->validate();

        auth()->user()->tags()->create([
            'name' => optional($input)['name'],
            'slug' => optional($input)['slug'],
        ]);
    }

    /**
     * update
     *
     * @param  mixed $tag
     * @param  mixed $input
     * @return void
     */
    public function update($tag, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug,' . $tag->id],
        ])->validate();

        $tag->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'],
        ])->save();
    }

    /**
     * delete
     *
     * @param  mixed $tag
     * @return void
     */
    public function delete($tag)
    {

    }
}
