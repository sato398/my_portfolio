<?php

namespace App\Http\Livewire\Site\Parts;

use Livewire\Component;
use App\Models\Work as WorkModel;
use App\Models\WorkCategory;

class Work extends Component
{
    public $workItems;
    public $workCategories;

    public function mount()
    {
        $this->workItems = WorkModel::with(['workCategory', 'workImages', 'baseTools', 'basePositions'])->get();
        $this->workCategories = WorkCategory::with(['works'])->get();
    }

    public function render()
    {
        return view('components.site.parts.work.livewire');
    }
}
