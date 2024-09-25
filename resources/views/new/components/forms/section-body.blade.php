<section {{ $attributes }}>
    <div class="row pt-2 ps-3">

        @isset($slot_filters)
            {{ $slot_filters }}
        @endisset

        {{ $slot }}
    </div>
</section>
