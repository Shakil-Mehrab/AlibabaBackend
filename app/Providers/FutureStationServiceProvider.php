<?php

namespace App\Providers;

use App\Bag\FSL\FutureStation;
use App\Bag\FSL\Http\ManageTag;
use App\Bag\FSL\Http\ManageMedia;
use App\Bag\FSL\Http\ManageTopic;
use App\Bag\FSL\Http\ManageRegion;
use App\Bag\FSL\Http\ManageArticle;
use App\Bag\FSL\Http\ManageCategory;
use Illuminate\Support\ServiceProvider;

class FutureStationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        FutureStation::manageCategoriesUsing(ManageCategory::class);
        FutureStation::manageTopicsUsing(ManageTopic::class);
        FutureStation::manageTagsUsing(ManageTag::class);
        FutureStation::manageMediasUsing(ManageMedia::class);
        FutureStation::manageRegionsUsing(ManageRegion::class);
        FutureStation::manageArticlesUsing(ManageArticle::class);
    }
}
