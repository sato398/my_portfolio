@props([
    "otherItem" => $otherItem,
])

@php
    use App\Services\Work\WorkImageTypeEnum;

    $thumbnail = $otherItem?->workImages->filter(function($image, $key) {
        return $image->type == WorkImageTypeEnum::getValue('デスクトップ');
    })->first();
@endphp

<div class="col-lg-6">
    <a class="portfolio-item" href="{{ route('work.item', ['workSlug' => $otherItem->slug]) }}">
        <div class="caption">
            <div class="caption-content">
                <h2>{{ $otherItem->title }}</h2>
            </div>
        </div>
        @if (!isset($thumbnail))
            <img class="img-fluid" src="{{ '/storage/images/no-image.png'}}">
        @else
            <img class="img-fluid" src="{{ '/storage' . $thumbnail?->path }}">
        @endif
    </a>
</div>
