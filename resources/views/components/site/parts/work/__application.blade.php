@php
    $items = [1,1]
@endphp

<div class="portfolio-item-wrap">
    <div class="portfolio-item-head-wrap">
        <h6 class="text-center text-danger mb-0">ウェブアプリケーション</h6>
        <h1 class="text-center portfolio-item-head">Web Application</h1>
    </div>
    <div class="row g-0 mt-3">
        @foreach ($items as $item)
            <x-site.parts.work.item :item="$item" />
        @endforeach
    </div>
</div>
