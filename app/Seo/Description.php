<?php

namespace App\Seo;

use Illuminate\Support\Arr;
use App\Facades\SingletonWorkModelForSeo;

class Description
{
    public static function get(string $key)
    {
        return self::description($key);
;
    }

    public static function description($key)
    {
        if($key === 'site.work-item') {
            $item = SingletonWorkModelForSeo::get();
            $description = strip_tags($item->explanation);
            $description = str_replace("\n", '', $description);
            $description = str_replace("\r", '', $description);
            if(mb_strlen($description) > 120){
                $description = mb_substr(strip_tags($description), 0, 120, "UTF-8") . '...';
            }
            return $item ? $item->title . 'のページです。' . $description : '';
        }

        return Arr::get([
            'site' => [
                'top' => 'Naoのポートフォリオサイトです！ゆっくりしていってください！',
                'about' => 'Naoに関する詳細のページです。',
                'skil' => 'Naoのスキルに関するページです。Laravelが得意です。',
                'work' => 'Naoの実績に関するページです。ECサイトを構築した経験などがあります。',
                'work-item' => '',
            ]
        ], $key);
    }
}
