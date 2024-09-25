@props(['title' => __('Головна')])

@extends('components.layouts.main')

@section('title', $title)

@section('content')

    <x-forms.section-title>
        {{ $title }}
    </x-forms.section-title>


@endsection
