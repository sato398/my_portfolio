<?php

namespace App\Http\Livewire\Site\Parts;

use Livewire\Component;
use App\Facades\Options;

class Top extends Component
{
    public $options;

    public function mount()
    {
        $this->options = Options::get();
    }

    public function render()
    {
        return view('components.site.parts.top.livewire');
    }
}
