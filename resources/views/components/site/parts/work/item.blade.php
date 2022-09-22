@props([
    'item' => $item ?? '',
])
@php
    use App\Services\Work\WorkImageTypeEnum;

    $thumbnail = $item?->workImages->filter(function($image, $key) {
        return $image->type == WorkImageTypeEnum::getValue('デスクトップ');
    })->first();
@endphp

<div class="col-lg-6">
    <a class="portfolio-item" href="{{ route('work.item', ['workSlug' => $item->slug]) }}">
        <div class="caption">
            <div class="caption-content">
                <h2 class="portfolio-item-caption-content-title">{{ $item->title }}</h2>
            </div>
        </div>
        @if (!isset($thumbnail))
            <img class="img-fluid" src="{{ '/storage/images/no-image.png'}}">
        @else
            <img class="img-fluid" src="{{ '/storage' . $thumbnail?->path }}">
        @endif

    </a>
</div>
