@props([
    "otherItem" => $otherItem,
])

@php
    use App\Services\Work\WorkImageTypeEnum;

    $thumbnail = $otherItem?->workImages->sortBy('sort')->filter(function($image, $key) {
        return $image->type == WorkImageTypeEnum::getValue('デスクトップ');
    })->first();
@endphp

<div class="col-lg-6">
    <a class="portfolio-item" href="{{ route('work.item', ['workSlug' => $otherItem->slug]) }}">
        <div class="caption">
            <div class="caption-content ">
                <h2 class="portfolio-item-caption-content-title">{{ $otherItem->title }}</h2>
            </div>
        </div>
        @if (!isset($thumbnail))
            <img class="img-fluid" src="{{ '/storage/images/no-image.png'}}">
        @else
            {!! \App\Http\Assets\WorkImages::item($otherItem) !!}
        @endif
    </a>
</div>
