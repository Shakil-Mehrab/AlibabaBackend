<?php

namespace App\Bag\FSL\Contracts;

interface ManageMedias
{
    /**
     * create
     *
     * @param  mixed $input
     * @return void
     */
    public function create(array $input);

    /**
     * update
     *
     * @param  mixed $media
     * @param  mixed $input
     * @return void
     */
    public function update($media, array $input);

    /**
     * delete
     *
     * @param  mixed $media
     * @return void
     */
    public function delete($media);
}
