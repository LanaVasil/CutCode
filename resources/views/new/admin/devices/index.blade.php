@props(['title' => __('Картриджі / Техніка')])

@extends('components.layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluide">
        <x-forms.breadcrumb>
            <li class="breadcrumb-item"><a class="breadcrumb__link" href="{{ route('home') }}">Головна</a></li>
            <li class="breadcrumb-item">ВКЗ</a></li>
            {{-- <li class="breadcrumb-item">Заправка картриджів / ремонт пристроїв</li> --}}
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </x-forms.breadcrumb>

        <x-forms.section-title>

            {{ $title }}

            <x-slot name="slot_links">
                <div class="col">
                    <a href="{{ route('admin.devices.create') }}" role="button" class="btn btn-circle">
                        <svg class="bi" aria-hidden="true">
                          <use xlink:href="#add"></use>
                        </svg>
                    </a>
                </div>
            </x-slot>
        </x-forms.section-title>



        <x-forms.section-body>


            <div class="col-12 col-sm-4 col-md-3 col-xl-2 pt-2 px-3">

                Lorem


                <a class="icon-link" href="#">
                    {{-- <img src="{{ Vite::asset('resources/img/1.png') }} " alt="" class="bi" /> --}}
                    <svg class="bi">
                      <use xlink:href="#trash"></use>
                     </svg>
                    Icon link
                </a>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-xl-10 pb-3">

                <div class="row me-2 mb-2">
                    <div class="col-12 p-0">
                        @include('includes.success')
                    </div>
                </div>

                <div class="row me-2 mb-2 devices__items">
                    @if (empty($devices))
                        <h5 class="col">{{ __('Записи відсутні') }}</h5>
                    @else
                        {{ $devices->links() }}

                        @foreach ($devices as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-2 p-0">
                                <x-devices.card :item="$item" :loop="$loop" />
                            </div>
                        @endforeach

                    @endif

                </div>
            </div>


            {{-- <a name="" id="" class="btn btn-primary" href="#" role="button">Button</a> --}}

            {{-- </div> --}}

        </x-forms.section-body>

    </div>
    {{-- @json($devices); --}}


@endsection
