<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>
    <body class="antialiased">

            <div class="container d-flex justify-content-center mt-5">
                <div class="d-flex flex-column align-items-center gap-2">
                    <a href="{{ route('mobguesser') }}" class="btn btn-secondary btn-xl">
                        Mobs
                    </a>
                    <a href="{{ route('blockguesser') }}" class="btn btn-secondary btn-xl">
                        Blocks
                    </a>
                    <a href="{{ route('itemguesser') }}" class="btn btn-secondary btn-xl">
                        Items
                    </a>
                </div>
            </div>
            
        </div>
    </body>
</html>
