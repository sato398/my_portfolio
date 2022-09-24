<?php

namespace App\Seo;

use Illuminate\Support\Arr;
use App\Facades\SingletonWorkModelForSeo;

class Title
{
    public static function get(string $key)
    {
        return [
            'title' => self::title($key),
            // 'titleOverride' => self::isOverride($key) ?: false,
        ];
    }

    public static function title($key)
    {
        if ($key === 'site.work-item') {
            $item = SingletonWorkModelForSeo::get();
            return $item ? $item->title . ' -- Nao\'s Portfolio' : '';
        }

        return Arr::get([
            'site' => [
                'top' => 'Nao\'s Portfolio',
                'about' => 'About -- Nao\'s Portfolio',
                'skil' => 'Skil -- Nao\'s Portfolio',
                'work' => 'Work -- Nao\'s Portfolio',
                'work-item' => '',
            ],
            'errors' => [
                '404' => '404',
                '419' => '419',
                '500' => '500',
                '503' => 'メンテナンス',
                '504' => '504',
            ]
        ], $key);
    }
}
