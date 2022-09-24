<?php

namespace App\Seo;

use Illuminate\Support\Arr;
use App\Facades\SingletonWorkModelForSeo;

class Canonical
{
    public static function get(string $key)
    {
        $routeName = self::routeName($key);

        if(!is_scalar($routeName)){
            [$routeName, $routeParams] = $routeName;
            return $routeName ? route($routeName, $routeParams) : '';
        }

        return $routeName ? route($routeName) : '';
    }

    protected static function routeName($key)
    {
        if($key === 'site.work-item'){
            $item = SingletonWorkModelForSeo::get();
            return $item ? ['work.item', ['workSlug' => $item->slug]] : null;
        }

        return Arr::get([
            'site' => [
                'top' => 'top',
                'about' => 'about',
                'skil' => 'skil',
                'work' => 'work',
                'work-item' => '',
            ]
        ], $key);
    }
}
