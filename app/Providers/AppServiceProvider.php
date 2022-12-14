<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Encore\Admin\Form\NestedForm as NestedFormOrigin;
use App\Admin\Extensions\Form\NestedForm;
use App\Seo\SingletonWorkModelForSeo;
use App\Services\Options;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 登録する必要のある全コンテナシングルトン
     *
     * @var array
     */
    public $singletons = [
        'SingletonWorkModelForSeo' => SingletonWorkModelForSeo::class,
        'Options' => Options::class,
    ];

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
        if (App::environment(['product'])) {
            URL::forceScheme('https');
        }
    }
}
