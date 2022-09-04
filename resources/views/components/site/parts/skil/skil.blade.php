@php
    $skilLists = [1,1,1]
@endphp

<section class="service-section">
    {{-- <div class="bg-primary text-white text-center service-container-wrap">
        <div class="container">
            <div class="service-items">
                <div class="service-item-head-wrap">
                    <h6 class="text-secondary mb-0">言語</h6>
                    <h1 class="service-item-head">Language</h1>
                </div>
                <div class="row service-item-body">
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>PHP</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>JavaScript</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-like"></i></span>
                        <h4><strong>HTML</strong></h4>
                        <p class="mb-0 text-faded"><span>開発年数１年</span></p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>CSS</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>SQL</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Sass</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @foreach ($skilLists as $skilList)
        <x-site.parts.skil.skil_list :loop="$loop"/>

        @if (!$loop->last)
            @if ($loop->odd)
                <div class="service-gradation is-odd"><div class="section-arrow service-section-arrow"></div></div>
            @else
                <div class="service-gradation is-even"><div class="section-arrow service-section-arrow"></div></div>
            @endif
        @endif
    @endforeach
    {{-- <div class="bg-success text-white text-center service-container-wrap">
        <div class="container">
            <div class="service-items">
                <div class="service-item-head-wrap">
                    <h6 class="text-secondary mb-0">フレームワーク</h6>
                    <h1 class="service-item-head">Framework</h1>
                </div>
                <div class="row service-item-body">
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Laravel</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong><strong>jQuery</strong></strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-like"></i></span>
                        <h4><strong><strong>Bootstrap</strong></strong></h4>
                        <p class="mb-0 text-faded"><span>開発年数１年</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-gradation is-even"><div class="section-arrow service-section-arrow"></div></div>

    <div class="bg-primary text-white text-center service-container-wrap">
        <div class="container">
            <div class="service-items">
                <div class="service-item-head-wrap">
                    <h6 class="text-secondary mb-0">ツール</h6>
                    <h1 class="service-item-head">Tools</h1>
                </div>
                <div class="row service-item-body">
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Docker</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>GitHub</strong></h4>
                        <p class="mb-0 text-faded">開発年数１年</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-like"></i></span>
                        <h4><strong>MySQL</strong></h4>
                        <p class="mb-0 text-faded"><span>開発年数１年</span></p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong><strong>CircleCI</strong></strong></h4>
                        <p class="mb-0 text-faded">開発年数１年未満</p>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 service-item"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-like"></i></span>
                        <h4><strong><strong>Node.js</strong></strong></h4>
                        <p class="mb-0 text-faded"><span>開発年数１年未満</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>


