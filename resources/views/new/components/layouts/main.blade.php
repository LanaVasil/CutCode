<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} :: @yield('title', 'Головна')</title>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js'], 'dist') --}}
    @vite(['resources/sass/app.scss', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'resources/js/app.js'])

    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon" />
</head>

<body>
    {{-- кнопка повернення на початок при скроле --}}
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div>

    @include('includes.svg')

    <div class="wrapper">
        {{-- <div class="d-flex flex-column justify-content-between min-vh-100"> --}}
        @if (Route::has('login'))
            @auth
                @include('includes.header')
            @endauth
        @endif

        {{-- <main class="flex-grow-1"> --}}
        <main class="main">
            <!-- Content -->
            @yield('content')
            <!-- /Content -->
        </main>

        @include('includes.footer')

        {{-- </div> --}}
    </div>

    {{-- <button id="top">
        
    </button> --}}

    {{-- 1:15:00 Полный курс Laravel 10 _ Компоненты + Вёрстка.mp4 --}}
    {{-- admin/devices/ create.blade.php --}}
    {{-- зроблено окремий компонент form.trix --}}
    {{-- @stack('js') --}}
</body>

</html>
