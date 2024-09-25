@props(['title' => __('Картриджі / Техніка')])

@extends('components.layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluide">
        <x-forms.breadcrumb>
            <li class="breadcrumb-item"><a class="breadcrumb__link" href="{{ route('home') }}">Головна</a></li>
            <li class="breadcrumb-item">ВКЗ</a></li>
            {{-- <li class="breadcrumb-item">Заправка картриджів / ремонт пристроїв</li> --}}
            <li class="breadcrumb-item active">{{ $title }}</li>
            <li class="breadcrumb-item active" aria-current="page">Редагувати</li>
        </x-forms.breadcrumb>

        <x-forms.section-title>

            {{ $title }} :: Редагувати

            <x-slot name="slot_links">
                <div class="col">
                    <a href="{{ route('admin.devices.index') }}" role="button" class="btn btn-circle bi icon-link">
                        <svg class="bi icon-link" aria-hidden="true">
                            <use xlink:href="{{ Vite::asset('resources/img/clear.svg') }}"></use>
                        </svg>
                    </a>
                </div>
            </x-slot>
        </x-forms.section-title>



        <x-forms.section-body>

            <div class="row">
                <div class="col-12 col-xs-8 offset-xs-2 col-md-6 offset-md-3 col-xl-3 offset-xl-4 p-0">
                    @include('includes.errors-validation')
                </div>
            </div>

            {{-- <x-forms.section-body class="col-12 col-xs-4 col-md-6 offset-md-3"> --}}
            <div class="row pt-2 ps-3">

                <div class="col-12 col-xs-8 offset-xs-2 col-md-6 offset-md-3 col-xl-3 offset-xl-4 pt-2 px-3">

                    <x-forms.form action="{{ route('admin.devices.update', $device->id) }}" method="POST">
                        @method('PUT')
                        @include('admin.devices.form-fields')
                    </x-forms.form>

                </div>
            </div>
        </x-forms.section-body>

        {{-- <x-form.trix /> --}}


    </div>
@endsection
