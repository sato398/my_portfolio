@php
    use Illuminate\Support\Str;

    $aboutText1 = preg_replace(
        '/<p>/',
        '<p class="intro-text d-sm-table mx-sm-auto d-md-block">',
        Str::markdown($options->about_first_text ?? '')
    );
    $aboutText2 = preg_replace(
        '/<p>/',
        '<p class="intro-text d-sm-table mx-sm-auto d-md-block">',
        Str::markdown($options->about_second_text ?? '')
    );
    $aboutText3 = preg_replace(
        '/<p>/',
        '<p class="intro-text d-sm-table mx-sm-auto d-md-block">',
        Str::markdown($options->about_third_text ?? '')
    );
@endphp

<div class="about-section-wrap">

    <section class="about-section" id="first" style="background-image: url({{ '/storage/' . $options->about_first_image }});">
        <div class="intro-body w-100">
            <div class="container">
                <div class="row">
                    <div class="about-inner col-lg-4 col-md-6 col-sm-12 mx-auto ms-0 me-auto">
                        <h2 class="brand-heading">{{ $options->about_first_title }}</h2>
                        {!! $aboutText1 !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="section-arrow about-section-arrow"></div>
    </section>

    <section class="about-section" id="second" style="background-image: url({{ '/storage/' . $options->about_second_image }});">
        <div class="intro-body w-100">
            <div class="container">
                <div class="row">
                    <div class="about-inner col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <h2 class="brand-heading">{{ $options->about_second_title }}</h2>
                        {!! $aboutText2 !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="section-arrow about-section-arrow"></div>
    </section>

    <section class="about-section" id="third" style="background-image: url({{ '/storage/' . $options->about_third_image }});">
        <div class="intro-body w-100">
            <div class="container">
                <div class="row">
                    <div class="about-inner col-lg-4 col-md-6 col-sm-12 mx-auto ms-auto me-0">
                        <h2 class="brand-heading">{{ $options->about_third_title }}</h2>
                        {!! $aboutText3 !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
