<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form\NestedForm as NestedFormOrigin;
use App\Admin\Extensions\Form\NestedForm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
