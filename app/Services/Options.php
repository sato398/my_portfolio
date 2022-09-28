<?php

namespace App\Services;

use App\Models\Option;

class Options
{
    protected $options;

    public function __construct()
    {
        $this->options = (new Option)->getOptions();
    }

    public function get()
    {
        return $this->options;
    }
}
