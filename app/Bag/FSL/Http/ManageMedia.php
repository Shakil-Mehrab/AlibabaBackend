<?php

namespace App\Bag\FSL\Http;

use App\Bag\FSL\Contracts\ManageMedias;
use Illuminate\Support\Facades\Validator;

class ManageMedia implements ManageMedias
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
            'upload' => ['required', 'image', 'mimes:png,jpg,gif,svg,jpeg.webp', 'max:10240'],
            'caption' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ])->validate();

        $upload = $input['upload'];

        auth()->user()->medias()->create([
            'name' => $upload->getClientOriginalName(),
            'caption' => $input['caption'],
            'description' => $input['description'],
            'size' => $upload->getSize(),
            'mime_type' => $upload->getMimeType(),
            'disk' => $disk = 'media',
            'path' => $path = $upload->store('/',  $disk)
        ]);
    }

    /**
     * update
     *
     * @param  mixed $media
     * @param  mixed $input
     * @return void
     */
    public function update($media, array $input)
    {
        Validator::make($input, [
            'caption' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ])->validate();

        $media->forceFill([
            'caption' => $input['caption'],
            'description' => $input['description'],
        ])->save();
    }

    /**
     * delete
     *
     * @param  mixed $media
     * @return void
     */
    public function delete($media)
    {

    }
}
