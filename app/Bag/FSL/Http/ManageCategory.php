<?php

namespace App\Bag\FSL\Http;

use Illuminate\Support\Facades\Validator;
use App\Bag\FSL\Contracts\ManageCategories;

class ManageCategory implements ManageCategories
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
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
            'parent_id' => ['nullable'],
            'live' => ['nullable', 'boolean'],
        ])->validate();

        auth()->user()->categories()->create([
            'name' => optional($input)['name'],
            'slug' => optional($input)['slug'],
            'parent_id' => optional($input)['parent_id'],
            'live' => !!optional($input)['live'],
        ]);
    }

    /**
     * update
     *
     * @param  mixed $category
     * @param  mixed $input
     * @return void
     */
    public function update($category, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug,' . $category->id],
            'parent_id' => ['nullable'],
            'live' => ['nullable', 'boolean'],
        ])->validate();

        $category->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'parent_id' => $input['parent_id'],
            'live' => $input['live'],
        ])->save();
    }

    /**
     * delete
     *
     * @param  mixed $category
     * @return void
     */
    public function delete($category)
    {

    }
}