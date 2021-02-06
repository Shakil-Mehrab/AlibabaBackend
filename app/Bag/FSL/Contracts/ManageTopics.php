<?php

namespace App\Bag\FSL\Contracts;

interface ManageTopics
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
     * @param  mixed $topic
     * @param  mixed $input
     * @return void
     */
    public function update($topic, array $input);

    /**
     * delete
     *
     * @param  mixed $topic
     * @return void
     */
    public function delete($topic);
}