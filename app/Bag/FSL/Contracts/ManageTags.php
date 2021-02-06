<?php

namespace App\Bag\FSL\Contracts;

interface ManageTags
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
     * @param  mixed $tag
     * @param  mixed $input
     * @return void
     */
    public function update($tag, array $input);

    /**
     * delete
     *
     * @param  mixed $tag
     * @return void
     */
    public function delete($tag);
}
