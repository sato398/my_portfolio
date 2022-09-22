<section id="portfolio" class="content-section">
    <div class="container">
        @foreach ($workCategories as $workCategory)
            <x-site.parts.work.work_list :workCategory="$workCategory"/>
        @endforeach
    </div>
</section>
