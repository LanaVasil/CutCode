{{-- https://trix-editor.org/  встановлена версія Trix 1.3.1 --}}
{{-- Полный курс Laravel 10 _ Компоненты + Вёрстка.mp4 --}}

<input type="hidden" id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
<trix-editor input="{{ $name }}"></trix-editor>

{{-- @once
    @push('css')
        <link rel="stylesheet" href="/css/trix.css">
    @endpush

    @push('js')
        <script src="/js/trix.js"></script>
    @endpush
@endonce --}}
