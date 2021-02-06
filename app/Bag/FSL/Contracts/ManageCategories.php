<?php

namespace App\Bag\FSL\Contracts;

interface ManageCategories
{
    /**
     * create.
     *
     * @param  array  $input
     * @return mixed
     */
    public function create(array $input);

    /**
     * update
     *
     * @param  mixed $category
     * @param  mixed $input
     * @return void
     */
    public function update($category, array $input);

    public function delete($category);
}
