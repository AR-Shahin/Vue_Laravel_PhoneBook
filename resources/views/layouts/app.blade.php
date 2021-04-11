<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vue + Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('css')
    </head>
    <body>
        <div id="app">
            @yield('app_content')
        </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script')
    </body>
</html>
