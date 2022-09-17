<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form\NestedForm as NestedFormOrigin;
use App\Admin\Extensions\Form\NestedForm;

class LaravelAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'Encore\\Admin\\Form\\Builder',
        //     'App\\Admin\\Extensions\\Form\\Builder'
        // );

        // $this->app->bind(
        //     'Encore\\Admin\\Form\\NestedForm',
        //     'App\\Admin\\Extensions\\Form\\NestedForm'
        // );

        // $this->app->bind(
        //     'Encore\\Admin\\Form\\Field\\HasMany',
        //     'App\\Admin\\Extensions\\Form\\Field\\HasMany'
        // );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
