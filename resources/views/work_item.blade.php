<x-site.app :page="'work-item'" :key="'site.work-item'">

    <x-slot name="content">

        {{-- @livewire('site.parts.workItem') --}}
        <x-site.parts.workItem.work_item />

    </x-slot>

</x-site.app>
