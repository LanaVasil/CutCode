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


    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon" />
</head>

<body>
    {{-- @if (Route::has('login'))
    @else --}}
    <main class="entry">
        <div class="entry__container">

            @include('includes.header-entry')

            <div class="entry__wrapper">
                <h1 class="entry__title">
                    @yield('title', '')
                </h1>
            </div>

            @if (!Route::has('register'))
            {{-- для форми Реєстрації на показивати помилки --}}
            <div class="row">
                <div class="col-12">
                  @include('includes.errors-validation')
                </div>
            </div>
            @endif 

            <div class="row">
              <div class="col-12">
                  @include('includes.success')
              </div>
            </div>           

            <!-- Content -->
            @yield('content')
            <!-- /Content -->

        </div>
    </main>
    {{-- @endif --}}
</body>

</html>
{{-- <button class="btn-reset btn-circle" aria-label="Огляд"> --}}

{{-- зразок кнопки --}}
{{-- <svg class="bi icon-link" aria-hidden="true">
                <use xlink:href="sprite.svg#arrow-down"></use>
            </svg> --}}
{{-- ./зразок кнопки --}}

{{-- </button> --}}
