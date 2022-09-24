<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SingletonWorkModelForSeo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SingletonWorkModelForSeo';
    }
}
