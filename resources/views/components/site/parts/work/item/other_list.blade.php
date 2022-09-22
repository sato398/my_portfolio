@props([
    "otherItems" => $otherItems,
])

<div class="portfolio-item-wrap mt-5">
    <div class="portfolio-detail-head-wrap">
        <h6 class="text-center text-danger mb-0">別の実績</h6>
        <h1 class="text-center portfolio-detail-head">Other Works</h1>
    </div>
    <div class="row g-0 mt-3">
        @foreach ($otherItems as $otherItem)
            <x-site.parts.work.item.other_item :otherItem="$otherItem"/>
        @endforeach
    </div>
</div>
