<div class="row py-2 ps-3 border-bottom">
    <h1 class="h3 col-12 col-md-6">
        {{ $slot }}
    </h1>

    @isset($slot_links)
        {{ $slot_links }}
    @endisset
</div>
