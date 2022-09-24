<?php

namespace App\Http\Domains;

class Domain
{
    public static function appType()
    {
        $type = request()->path();

        $admin = config('admin.route.prefix');

        if(preg_match('/^'.$admin.'*?/', $type)){
            return 'admin';
        }else{
            return 'site';
        }
    }
}
