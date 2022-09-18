@props([
    'item' => $item ?? '',
])

<div class="col-lg-6">
    <a class="portfolio-item" href="{{ route('work.item', ['workSlug' => $item->slug]) }}">
        <div class="caption">
            <div class="caption-content">
                <h2>{{ $item->title }}</h2>
                <p class="mb-0"></p>
            </div>
        </div>
        <img class="img-fluid" src="{{ '/storage' . $item->workImages[0]?->path }}">
    </a>
</div>
