<section class="service-section">
    @foreach ($skilLists as $skilList)
        <x-site.parts.skil.skil_list :loop="$loop" :skilList="$skilList" :tools="$tools"/>

        @if (!$loop->last)
            @if ($loop->odd)
                <div class="service-gradation is-odd"><div class="section-arrow service-section-arrow"></div></div>
            @else
                <div class="service-gradation is-even"><div class="section-arrow service-section-arrow"></div></div>
            @endif
        @endif
    @endforeach

</section>



