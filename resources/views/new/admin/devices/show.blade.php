@props(['title' => __('Картриджі / Техніка')])

@extends('components.layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluide">
        <x-forms.breadcrumb>
            <li class="breadcrumb-item"><a class="breadcrumb__link" href="{{ route('home') }}">Головна</a></li>
            <li class="breadcrumb-item">ВКЗ</a></li>
            {{-- <li class="breadcrumb-item">Заправка картриджів / ремонт пристроїв</li> --}}
            <li class="breadcrumb-item"><a class="breadcrumb__link"
                    href="{{ route('admin.devices.index') }}">{{ $title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Огляд</li>
        </x-forms.breadcrumb>


        <x-forms.section-title>

            {{ $title }} :: Огляд

            <x-slot name="slot_links">
                <div class="col d-flex justify-content-evenly">
                    <a href="{{ route('admin.devices.index') }}" class="btn btn-circle bi icon-link">
                        <svg class="bi icon-link" aria-hidden="true">
                            <use xlink:href="{{ Vite::asset('resources/img/undo.svg') }}"></use>
                        </svg>
                        Повернутись</a>


                    <a href="{{ route('admin.devices.edit', $device->id) }}" role="button"
                        class="btn btn-circle">
                          <svg class="bi" aria-hidden="true">
                            <use xlink:href="#pencil"></use>
                          </svg>
                    </a>

                        {{-- @if ($device->repdevices->count() == 0) --}}

                        <x-forms.form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST">
                          @method('DELETE')

                          <button type="submit"  class="btn btn-circle">
                            <svg class="bi" aria-hidden="true">
                              <use xlink:href="#trash"></use>
                            </svg>
                          </button>
                        </x-forms.form>

                        {{-- @endif                         --}}
                </div>
            </x-slot>
        </x-forms.section-title>

        <x-forms.section-body>

            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-xl-3 offset-xl-4 p-0">
                    @include('includes.success')
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-xl-3 offset-xl-4 border mt-2 mb-2 py-3">

                    <p class="fs-5 fw-bold opacity-50">{{ $device->devtype->name }}</p>
  

                    <p class="card__oneline">{{ $device->brand->name }}</p>

                    <h3>
                        <a href="{{ route('admin.devices.edit', $device->id) }}">
                            {{ $device->name }}
                        </a>
                    </h3>

                    {{-- <p>Активний {{ $device->status }}</p> --}}

                    <p>{{ ($device->status )}} @if($device->status) Aктивний @endif</p>

                </div>
            </div>

        </x-forms.section-body>
    </div>
@endsection
