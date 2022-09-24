<?php

namespace App\Seo;

class Icons
{
    public static function get()
    {
        $iconPath = url('/storage/icons');

        return <<<HTML

        <link rel="shortcut icon" href="${iconPath}/favicon.ico">
        <link rel="apple-touch-icon" href="${iconPath}/n-icon.png">
        <link rel="icon" type="image/png" href="${iconPath}/n-icon.png">

HTML;
    }
}
