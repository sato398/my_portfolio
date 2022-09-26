<?php

namespace App\Http\Livewire\Site\Parts\Work\Item;

use Livewire\Component;
use App\Models\Work;

class WorkItem extends Component
{
    public $item;
    public $othreItems;

    public function mount()
    {
        $request = request();
        $itemSlug = $request->workSlug;
        $this->item = Work::whereSlug($itemSlug)->with(['workCategory', 'workImages', 'baseTools', 'basePositions'])->first();

        abort_if(is_null($this->item), 404);

        $works = Work::with(['workCategory', 'workImages', 'baseTools', 'basePositions'])->orderBy('sort', 'asc')->get();
        $this->othreItems = $works->whereNotIn('slug', $itemSlug);
    }

    public function render()
    {
        return view('components.site.parts.work.item.livewire');
    }
}
