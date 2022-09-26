@props([
    'workCategory' => $workCategory ?? '',
])

@if (!$workCategory->works->where('work_category_id', $workCategory->id)->isEmpty())
    <div class="portfolio-item-wrap">
        <div class="portfolio-item-head-wrap">
            <div class="text-center text-danger mb-0 work-category-title">{{ $workCategory->name }}</div>
            <h2 class="text-center portfolio-item-head work-category-title-en">{{ $workCategory->name_en }}</h2>
        </div>
        <div class="row g-0 mt-3">
            @foreach ($workCategory->works->where('work_category_id', $workCategory->id)->sortBy('sort') as $item)
                <x-site.parts.work.item :item="$item" />
            @endforeach
        </div>
    </div>
@endif

