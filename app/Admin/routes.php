<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('base-tool-categories', 'BaseToolCategoryController');
    $router->resource('base-tools', 'BaseToolController');
    $router->resource('base-positions', 'BasePositionController');
    $router->resource('base-positions-sort', 'BasePositionSortController');
    $router->resource('base-tool-version-sort', 'BaseToolVersionSortController');

    $router->resource('works', 'WorkController');
    $router->resource('work-categories', 'WorkCategoryController');
    $router->resource('work-sort', 'WorkSortController', ['only' => ['index', 'store']]);
    $router->resource('work-category-sort', 'WorkCategorySortController', ['only' => ['index', 'store']]);
    $router->resource('work-image-sort', 'WorkImageSortSelectController', ['only' => ['index']]);
    $router->resource('{work}/work-image-sort', 'WorkImageSortController', ['only' => ['index', 'store']]);

    $router->resource('skils', 'SkilController');
    $router->resource('skil-sort', 'SkilSortController', ['only' => ['index', 'store']]);
    $router->resource('skil-tool-sort', 'SkilToolSortController', ['only' => ['index', 'store']]);

    $router->get('options', 'OptionController@create')->name('options.create');
    $router->post('options', 'OptionController@store')->name('options.store');
});
