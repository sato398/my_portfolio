<?php

namespace App\Seo;

use App\Models\Work;
use Carbon\Carbon;

class SingletonWorkModelForSeo
{
    protected $item;

    public function __construct()
    {
        $itemSlug = request()->route('workSlug');
        $this->item = Work::whereSlug($itemSlug)->first();
    }

    public function get()
    {
        return $this->item;
    }
}
