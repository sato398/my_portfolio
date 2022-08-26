<x-app :page="$page ?? ''">

    <x-slot name="meta">
        <x-site.elements.meta :key="$key ?? ''" />
    </x-slot>

    <x-slot name="header">
        <x-site.elements.header :key="$key ?? ''" />
    </x-slot>

    <x-slot name="content">
        {{ $content ?? '' }}
    </x-slot>

    <x-slot name="footer">
        <x-site.elements.footer :key="$key ?? ''" />
    </x-slot>

    <x-slot name="bottom">
        <x-site.elements.bottom :key="$key ?? ''" />
    </x-slot>

</x-app>
