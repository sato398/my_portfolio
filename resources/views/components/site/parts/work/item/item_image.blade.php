@props([
    'item' => $item ?? '',
])

@php
    use App\Services\Work\WorkImageTypeEnum;

    $pcImages = $item->workImages->sortBy('sort')->filter(function($item, $key) {
        return $item->type == WorkImageTypeEnum::getValue('デスクトップ');
    });
    $spImages = $item->workImages->sortBy('sort')->filter(function($item, $key) {
        return $item->type == WorkImageTypeEnum::getValue('スマホ');
    });

@endphp

<div class="portfolio-detail-images mt-5">
    @if (!$pcImages->isEmpty())
        <div class="portfolio-detail-images-wrap-pc">
            @php
                $index = 0;
            @endphp
            @foreach ($pcImages as $image)
                <div class="portfolio-detail-image-wrap portfolio-detail-image-wrap-pc">
                    @if (WorkImageTypeEnum::getDescription($image->type) === "デスクトップ")
                        <img class="portfolio-detail-image w-100 h-auto" src="{{ '/storage' . $image->path }}" alt="{{ $item->title . 'の画像' . ++$index }}">
                    @else

                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if (!$spImages->isEmpty())
        <div class="portfolio-detail-image-wrap portfolio-detail-images-sp row">
            @php
                $index = 0;
            @endphp
            @foreach ($spImages as $image)
                <div class="portfolio-detail-image-wrap-sp col-lg-4 col-md-6 col-sm-12">
                    @if (WorkImageTypeEnum::getDescription($image->type) === "スマホ")
                        <img class="portfolio-detail-image-sp w-100 h-auto" src="{{ '/storage' . $image->path }}" alt="{{ $item->title . 'のスマホ画像' . ++$index }}">
                    @else

                    @endif
                </div>
            @endforeach
        </div>
    @endif

</div>

