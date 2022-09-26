@props([
    'item' => $item,
])

@if (isset($item))
    <div class="portfolio-detail-head-wrap">
        <div class="text-center text-danger mb-0 work-category-title">{{ $item->workCategory->name }}</div>
        <h2 class="text-center portfolio-detail-head work-category-title-en">{{ $item->workCategory->name_en }}</h2>
    </div>
    <div class="mt-5">
        <h2 class="text-center">{{ $item->title }}</h2>
        <div class="w-75 mx-auto mt-5 mb-5">
            @php
                $content = preg_replace('{<p>}us', '<p class="d-table mx-auto">', $item->explanation);
            @endphp
            {!! $content !!}
        </div>
        <div class="text-center work-item-tools">使用したツール
            <p class="text-center work-item-tool mt-1">
                @foreach ($item->baseTools->sortBy('sort') as $tool)
                    @if ($loop->last)
                        {{ $tool->name }}
                    @else
                        {{ $tool->name }}<span class="slash"> /</span><br class="br">
                    @endif
                @endforeach
            </p>
        </div>
        <div class="text-center work-item-positions">担当箇所
            <p class="text-center work-item-position mt-1">
                @foreach ($item->basePositions->sortBy('sort') as $position)
                    @if ($loop->last)
                        {{ $position->name }}
                    @else
                        {{ $position->name }}<span class="slash"> /</span><br class="br">
                    @endif
                @endforeach
            </p>
        </div>
        @if (isset($item->url))
            <div class="text-center work-item-url mt-5">
                <p class="text-center work-item-position mt-1">
                    リンク：<a href="{{ $item->url }}" target="__blank">{{ $item->title }}</a>
                </p>
            </div>
        @endif
        @if (isset($item->basic_user_name))
        <div class="text-center work-item-basic">
            <p class="text-center work-item-basic-name mt-1">
                ユーザー名：{{ $item->basic_user_name }}
            </p>
            <p class="text-center work-item-basic-password mt-1">
                パスワード：{{ $item->basic_user_password }}
            </p>
        </div>
        @endif

        <x-site.parts.work.item.item_image :item="$item"/>
    </div>

@else
    <div class="text-center">
        該当の実績が見つかりませんでした。
    </div>
@endif

