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
    @endif
</footer>
