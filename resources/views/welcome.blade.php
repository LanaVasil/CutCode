<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  {{-- <html lang="uk"> --}}
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js'], 'dist') --}}
        @vite(['resources/sass/app.scss', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'resources/js/app.js'])
          
        <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon" />
          
    </head>
    <body class="antialiased">

    </body>
</html>
