@php
    $items = [1,1,1,1,1,1];
    $bg_color = $loop->odd ? 'bg-primary' : 'bg-success';
@endphp

<div class="{{$bg_color}} text-white text-center service-container-wrap">
    <div class="container">
        <div class="service-items">
            <div class="service-item-head-wrap">
                <h6 class="text-secondary mb-0">言語</h6>
                <h1 class="service-item-head">Language</h1>
            </div>
            <div class="row service-item-body">
                @foreach ($items as $item)
                    <x-site.parts.skil.item :item="$item"/>
                @endforeach
            </div>
        </div>
    </div>
</div>