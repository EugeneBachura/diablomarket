<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        @include('fonts')

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/css/fonts.css', 'resources/css/bg.css', 'resources/js/app.js'])
        
    </head>
    <body class="antialiased font-diablo-light">
        <div class="sm:flex sm:justify-center sm:items-center min-h-screen bg-center selection:text-white bg-black-radial-gradient">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10" style="position: fixed; height: 100%; width: 100%;">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8" style="position: fixed; width: 100%; height: 100%;">
                <div class="overlay"></div>
                <div class="stars" aria-hidden="true"></div>
                <div class="starts2" aria-hidden="true"></div>
                <div class="stars3" aria-hidden="true"></div>
                <main class="main">
                    <section class="contact text-rose-700">
                        <h1 class="title">Diablo Market</h1>
                        <h2 class="sub-title font-old-fenris text-2xl text-shadow-medium">Site Under Construction</h2>
                    </section>
                </main>
            </div>
        </div>
    </body>
</html>
