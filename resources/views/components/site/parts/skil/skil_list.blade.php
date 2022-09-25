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
                <div class="text-secondary mb-0 skil-category-head">{{ $skilList->baseToolCategory->name }}</div>
                <h2 class="service-item-head skil-category-head-en">{{ $skilList->baseToolCategory->name_en }}</h2>
            </div>
            <div class="row service-item-body">
                @foreach ($skilList->items->sortBy('sort') as $item)
                    <x-site.parts.skil.item :item="$item" :tools="$tools"/>
                @endforeach
            </div>
        </div>
    </div>
</div>
