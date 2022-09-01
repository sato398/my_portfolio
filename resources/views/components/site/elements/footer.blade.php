@php
    $isActive = $key === 'site.top';
@endphp

<footer @class([
    'footer',
    'text-center',
    'fixed-bottom' => $isActive,
    'd-none' => !$isActive,
    ])>
    @if (!$isActive)

    @else
        <div class="container">
            <p class="mb-0 small">Copyright &nbsp;© Nao's Portfolio 2022</p>
        </div>
        <a class="js-scroll-trigger scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    @endif
</footer>
