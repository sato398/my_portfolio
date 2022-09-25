@props([
    "otherItems" => $otherItems,
])

<div class="portfolio-item-wrap mt-5">
    <div class="portfolio-detail-head-wrap">
        <div class="text-center text-danger mb-0 work-category-title">別の実績</div>
        <h2 class="text-center portfolio-detail-head work-category-title-en">Other Works</h2>
    </div>
    <div class="row g-0 mt-3">
        @foreach ($otherItems as $otherItem)
            <x-site.parts.work.item.other_item :otherItem="$otherItem"/>
        @endforeach
    </div>
</div>
