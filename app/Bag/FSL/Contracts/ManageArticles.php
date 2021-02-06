<?php

namespace App\Bag\FSL\Contracts;

interface ManageArticles
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
     * @param  mixed $article
     * @param  mixed $input
     * @return void
     */
    public function update($article, array $input);

    /**
     * delete
     *
     * @param  mixed $article
     * @return void
     */
    public function delete($article);
}
