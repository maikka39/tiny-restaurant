<div class="timeline-wrapper">
    <div class="timeline">
        <div class="timeline-inner"></div>
    </div>
    <div class="timeline-circle">
        {{-- TODO Fix arrow direction on mobile --}}
        <i class="fa fa-arrow-{{ $direction }} timeline-circle-logo"></i>

    </div>
    {{-- TODO Fix positioning--}}
    <span class="sm:block hide top-1/2 whitespace-nowrap">{{ $datetime }}</span>
</div>