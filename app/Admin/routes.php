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
    $router->resource('works', 'WorkController');
    $router->resource('work-categories', 'WorkCategoryController');
    $router->resource('skils', 'SkilController');
    $router->resource('skil-categories', 'SkilCategoryController');
});
