@php
    use Illuminate\Support\Str;

    $topText = preg_replace(
        '/<p>/',
        '<p class="lead mb-0 d-table mx-auto">',
        Str::markdown($options->top_text ?? '')
    );
@endphp

<section class="d-flex masthead top-contents" style="background-image: url({{ '/storage/' . $options->top_image }});">
    <div class="container my-auto text-center">
        <h3 class="mb-5 text-sm-left"><em>{{ $options->top_title_head }}</em></h3>
        <h1 class="mb-1 top-name">{{ $options->top_title }}</h1>
        <div class="top-text-wrap mt-5 text-sm-left">
            {!! $topText !!}
        </div>
        <div class="overlay"></div>
    </div>
</section>
