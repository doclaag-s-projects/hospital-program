<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        @vite('resources/css/app.css')
        <title>Programa Hospitalario - @yield('title')</title>
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    <a href="/">Programa Hospitalario</a>
                </h1>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            <div class="container mx-auto p-5">
                <p class="text-center text-gray-500">
                    &copy; {{ date('Y') }} Programa Hospitalario
                </p>
            </div>
        </footer>
    </body>
</html>
