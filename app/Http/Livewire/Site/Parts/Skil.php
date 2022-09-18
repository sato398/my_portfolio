<?php

namespace App\Http\Livewire\Site\Parts;

use Livewire\Component;
use App\Models\Skil as SkilModel;
use App\Models\BaseTool;

class Skil extends Component
{
    public $skilLists;
    public $tools;

    public function mount()
    {
        $this->skilLists = SkilModel::with(['items', 'baseToolCategory'])->get();
        $this->tools = BaseTool::all();
    }

    public function render()
    {
        return view('components.site.parts.skil.livewire');
    }
}
