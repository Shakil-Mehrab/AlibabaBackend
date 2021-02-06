<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\Files\FileController;
use App\Http\Controllers\Files\MediaController;
use App\Http\Controllers\Topic\TopicController;
use App\Http\Controllers\Region\RegionController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    });

    Route::group(['prefix' => 'topics'], function () {
        Route::get('/', [TopicController::class, 'index'])->name('topic.index');
        Route::get('/create', [TopicController::class, 'create'])->name('topic.create');
        Route::get('/{topic}/edit', [TopicController::class, 'edit'])->name('topic.edit');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('tag.create');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    });

    Route::group(['prefix' => 'regions'], function () {
        Route::get('/', [RegionController::class, 'index'])->name('region.index');
        Route::get('/create', [RegionController::class, 'create'])->name('region.create');
        Route::get('/{region}/edit', [RegionController::class, 'edit'])->name('region.edit');
    });

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/{article}/edit', [ProductController::class, 'edit'])->name('product.edit');
    });


    Route::group(['prefix' => 'files'], function () {
        Route::get('/', [FileController::class, 'index'])->name('files');
        Route::get('/{file}/download', [FileController::class, 'download'])->name('files.download');
    });

    Route::group(['prefix' => 'medias'], function () {
        Route::get('/', [MediaController::class, 'index'])->name('media');
    });


    Route::group(['prefix' => 'datatable'], function () {
        Route::get('/articles', [DatatableController::class, 'articles'])->name('datatable.articles');
        Route::get('/products', [DatatableController::class, 'products'])->name('datatable.product');
        Route::get('/categories', [DatatableController::class, 'categories'])->name('datatable.categories');
        Route::get('/topics', [DatatableController::class, 'topics'])->name('datatable.topics');
        Route::get('/tags', [DatatableController::class, 'tags'])->name('datatable.tags');
    });
});
