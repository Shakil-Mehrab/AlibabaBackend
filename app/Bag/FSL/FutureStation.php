<?php

namespace App\Bag\FSL;

use App\Bag\FSL\Contracts\ManageTags;
use App\Bag\FSL\Contracts\ManageMedias;
use App\Bag\FSL\Contracts\ManageTopics;
use App\Bag\FSL\Contracts\ManageRegions;
use App\Bag\FSL\Contracts\ManageArticles;
use App\Bag\FSL\Contracts\ManageCategories;

class FutureStation
{
    /**
     * manageCategoriesUsing
     *
     * @param  mixed $callback
     * @return void
     */
    public static function manageCategoriesUsing(string $callback)
    {
        return app()->singleton(ManageCategories::class, $callback);
    }

    /**
     * manageTopicsUsing
     *
     * @param  mixed $callback
     * @return void
     */
    public static function manageTopicsUsing(string $callback)
    {
        return app()->singleton(ManageTopics::class, $callback);
    }

    /**
     * manageTagsUsing
     *
     * @param  mixed $callback
     * @return void
     */
    public static function manageTagsUsing(string $callback)
    {
        return app()->singleton(ManageTags::class, $callback);
    }

    /**
     * manageMediasUsing
     *
     * @param  mixed $callback
     * @return void
     */
    public static function manageMediasUsing(string $callback)
    {
        return app()->singleton(ManageMedias::class, $callback);
    }

    /**
     * manageRegionsUsing
     *
     * @param  mixed $callback
     * @return void
     */
    public static function manageRegionsUsing(string $callback)
    {
        return app()->singleton(ManageRegions::class, $callback);
    }

    public static function manageArticlesUsing(string $callback)
    {
        return app()->singleton(ManageArticles::class, $callback);
    }
}
