@props([
    'item' => $item ?? '',
])

<div class="portfolio-detail-head-wrap">
    <h6 class="text-center text-danger mb-0">{{ $item->workCategory->name }}</h6>
    <h1 class="text-center portfolio-detail-head">{{ $item->workCategory->name_en }}</h1>
</div>
<div class="mt-5">
    <h2 class="text-center">{{ $item->title }}</h2>
    <div class="text-center w-75 mx-auto mt-5 mb-5">{!! $item->explanation !!}</div>
    <div class="text-center work-item-tools">使用したツール
        <p class="text-center work-item-tool mt-1">
            @foreach ($item->baseTools as $tool)
                @if ($loop->last)
                    {{ $tool->name }}
                @else
                    {{ $tool->name }}<span class="slash">/</span><br class="br">
                @endif
            @endforeach
        </p>
    </div>
    <div class="text-center work-item-positions">担当箇所
        <p class="text-center work-item-position mt-1">
            @foreach ($item->basePositions as $position)
                @if ($loop->last)
                    {{ $position->name }}
                @else
                    {{ $position->name }}<span class="slash">/</span><br class="br">
                @endif
            @endforeach
        </p>
    </div>

    <x-site.parts.work.item.item_image :item="$item"/>
</div>
