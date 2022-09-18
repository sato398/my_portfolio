@php
    use App\Services\Skil\SkilDevYearsEnum;
    $iconSet = is_null($item->icon)
@endphp

@props([
    'item' => $item ?? '',
    'tools' => $tools ?? '',
])

<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item">
    <span class="mx-auto service-icon rounded-circle mb-3">
        <i @class([
            $item->icon => $iconSet,
            'icon-screen-smartphone' => !$iconSet,
            ])>
        </i>
    </span>
    <h4><strong>{{ $tools->where('id', $item->base_tool_id)->first()->name }}</strong></h4>
    <p class="mb-0 text-faded">{{ SkilDevYearsEnum::getDescription($item->years_of_dev) }}</p>
</div>
