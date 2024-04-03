<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Diablo Market') }}</title>

        <!-- Fonts -->
        @include('fonts')

        <!-- Styles/Scripts -->
        @vite(['resources/css/app.css', 'resources/css/fonts.css', 'resources/css/bg.css', 'resources/js/app.js'])
    
        @livewireStyles

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black-radial-gradient pt-2">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="z-10 relative">
                {{-- @if (isset($header))
                    <header class="bg-white shadow z-10 relative">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif --}}
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <!-- Page Heading -->
                            @if (isset($header))
                                <header class="bg-white shadow z-10 relative max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{{ $header }}</header>
                            @endif
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
            <div class="mx-auto p-6 lg:p-8 main-container absolute {{--sm:flex sm:justify-center sm:items-start--}}">
                <div class="overlay z-0"></div>
                <div class="stars z-0" aria-hidden="true"></div>
                <div class="starts2 z-0" aria-hidden="true"></div>
                <div class="stars3 z-0" aria-hidden="true"></div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
