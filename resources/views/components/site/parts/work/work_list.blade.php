@props([
    'workCategory' => $workCategory ?? '',
])

@if (!$workCategory->works->where('work_category_id', $workCategory->id)->isEmpty())
    <div class="portfolio-item-wrap">
        <div class="portfolio-item-head-wrap">
            <h6 class="text-center text-danger mb-0">{{ $workCategory->name }}</h6>
            <h1 class="text-center portfolio-item-head">{{ $workCategory->name_en }}</h1>
        </div>
        <div class="row g-0 mt-3">
            @foreach ($workCategory->works->where('work_category_id', $workCategory->id) as $item)
                <x-site.parts.work.item :item="$item" />
            @endforeach
        </div>
    </div>
@endif

