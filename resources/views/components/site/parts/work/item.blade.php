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
        <div class="portfolio-item-image-wrap">
            @if (!isset($thumbnail))
                <img class="img-fluid object-fit-cover" src="{{ '/storage/images/no-image.png'}}">
            @else
                {!! \App\Http\Assets\WorkImages::item($item) !!}
            @endif
        </div>

    </a>
</div>
