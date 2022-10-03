<?php

namespace App\Seo;

use App\Seo\Title;
use App\Seo\Canonical;
use App\Seo\Description;

class Ogp
{
    public static function get($key)
    {
        $url = Canonical::get($key);
        if (!$url) {
            return '';
        }

        $title = Title::get($key);
        $title = $title['title'];

        $type = match ($key) {
            'top' => 'website',
            default => 'article',
        };

        //OGP画像を返す
        $image = match ($key) {
            default => url('/storage/ogp/Nogpimage.png'),
        };

        $topTitle = 'Nao\'s Portfolio';

        $description = Description::get($key);

        return <<<OGP

        <meta property="og:title" content="${title}">
        <meta property="og:type" content="${type}">
        <meta property="og:url" content="${url}">
        <meta property="og:image" content="${image}">
        <meta property="og:image:alt" content="${title}のイメージ画像">
        <meta property="og:site_name" content="${topTitle}">
        <meta property="og:description" content="${description}">
        <meta property="og:locale" content="ja_JP">

OGP;
    }
}
