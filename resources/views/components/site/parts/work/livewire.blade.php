<section id="portfolio" class="content-section">
    <div class="container">
        @if ($workItems->isEmpty())
            <p class="text-center mt-5">実績はありません。</p>
        @else
            @foreach ($workCategories as $workCategory)
                <x-site.parts.work.work_list :workCategory="$workCategory"/>
            @endforeach
        @endif

    </div>
</section>
