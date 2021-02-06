<?php

namespace App\Bag\FSL\Contracts;

interface ManageRegions
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
     * @param  mixed $region
     * @param  mixed $input
     * @return void
     */
    public function update($region, array $input);

    /**
     * delete
     *
     * @param  mixed $region
     * @return void
     */
    public function delete($region);
}
