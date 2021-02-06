<?php

namespace App\Bag\FSL\Http;

use Illuminate\Support\Facades\Validator;
use App\Bag\FSL\Contracts\ManageTopics;

class ManageTopic implements ManageTopics
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
            'slug' => ['required', 'string', 'max:255', 'unique:topics,slug'],
            'live' => ['nullable', 'boolean'],
        ])->validate();

        auth()->user()->topics()->create([
            'name' => optional($input)['name'],
            'slug' => optional($input)['slug'],
            'live' => !!optional($input)['live'],
        ]);
    }

    /**
     * update
     *
     * @param  mixed $topic
     * @param  mixed $input
     * @return void
     */
    public function update($topic, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:topics,slug,' . $topic->id],
            'live' => ['nullable', 'boolean'],
        ])->validate();

        $topic->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'live' => $input['live'],
        ])->save();
    }

    /**
     * delete
     *
     * @param  mixed $topic
     * @return void
     */
    public function delete($topic)
    {

    }
}
