<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.api_prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    // $router->get('/', 'HomeController@index')->name('home');
    // $router->resource('base-tool-categories', 'BaseToolCategoryController');
    // $router->post('baseTool', function() {
    //     return ['hoge', 'fuga'];
    // });
});
