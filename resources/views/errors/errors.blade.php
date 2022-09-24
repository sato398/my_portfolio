@php
    use App\Http\Domains\Domain;

    $appType = Domain::appType();
@endphp

@switch($appType)
    @case('site')
        <x-site.app :key="$key">
            <x-slot name="content">
                <section class="main-area container cid-t11qweH82f error-section">
                    <div class="container">
                        <h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold mbr-white caption">@yield('title')</h2>

                        <div class="row">
                            <div class="col-12 mt-5">
                                <p class="d-table m-auto pt-5">
                                    @yield('message')
                                </p>
                            </div>
                        </div>

                        @yield('content')
                    </div>
                </section>
            </x-slot>
        </x-site.app>
        @break
    @case('admin')
        @include('errors.admin_errors')
        @break
    @default
    @include('errors.admin_errors')
    @break

@endswitch

