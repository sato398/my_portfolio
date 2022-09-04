@php
    $workLists = [1,1]
@endphp

<section id="portfolio" class="content-section">
    <div class="container">

        @foreach ($workLists as $workList)
            <x-site.parts.work.work_list :workList="$workList"/>
        @endforeach

    </div>
</section>
