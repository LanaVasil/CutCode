{{-- <x-forms.card> --}}

{{-- відстань між картками --}}
<article data-pid="{{ $item->id }}" class="devices__item item-device card p-2 me-2 mb-2 align-self-stretch">

    <p class="item-device__devtype opacity-75">{{ $item->devtype->name }}</p>

    <p class="item-device__brand card__oneline opacity-75">{{ $item->brand->name }}</p>

    <h3 class="card__oneline h5">
        <a class="item-device__name" href="{{ route('admin.devices.show', $item->id) }}">
            {{ $item->name }}
        </a>
    </h3>

    <div class="small test-muted">
        {{ now()->format('d.m.Y') }} :: {{ $item->status }} @if ($item->status)
            Aктивний
        @endif
    </div>

    <div class="d-flex justify-content-between  pt-3">
        {{ $loop->iteration }} / #{{ $item->id }}
        Кошик

        {{-- кнопка додати в пакет --}}
        <a href="#" role="button" class="item-device__button btn btn-circle border">
        {{-- <a href="{{ route('admin.devices.addToCart', $item) }}" role="button" class="item-device__button btn btn-circle border"> --}}
        {{-- <a href="#" class="action-device__button btn btn-circle border"> --}}

            <svg class="item-device__svg bi" aria-hidden="true">
                <use xlink:href="#bag"></use>
            </svg>

        </a>

        {{-- <a href="#" class="btn btn-outline-secondary" role="button">До кошика</a> --}}
    </div>
</article>
{{-- </x-forms.card> --}}
