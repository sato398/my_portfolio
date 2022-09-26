<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form\NestedForm as NestedFormOrigin;
use App\Admin\Extensions\Form\NestedForm;
use App\Seo\SingletonWorkModelForSeo;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 登録する必要のある全コンテナシングルトン
     *
     * @var array
     */
    public $singletons = [
        'SingletonWorkModelForSeo' => SingletonWorkModelForSeo::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(
        //     'SingletonWorkModelForSeo',
        //     SingletonWorkModelForSeo::class
        // );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'product') {
            URL::forceScheme('https');
        }
    }
}
