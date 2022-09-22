@php
    $bg_color = $loop->odd ? 'bg-primary' : 'bg-success';
@endphp

@props([
    'skilList' => $skilList ?? '',
    'tools' => $tools ?? '',
])

<div class="{{$bg_color}} text-white text-center service-container-wrap">
    <div class="container">
        <div class="service-items">
            <div class="service-item-head-wrap">
                <h6 class="text-secondary mb-0">{{ $skilList->baseToolCategory->name }}</h6>
                <h1 class="service-item-head">{{ $skilList->baseToolCategory->name_en }}</h1>
            </div>
            <div class="row service-item-body">
                @foreach ($skilList->items as $item)
                    <x-site.parts.skil.item :item="$item" :tools="$tools"/>
                @endforeach
            </div>
        </div>
    </div>
</div>
