<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRM Energia do Condominio') }}</title>

    <!-- Fonts e estilos -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-100 flex font-sans min-h-screen">
    
    {{-- Sidebar fixo --}}
    @include('layouts.sidebar')

    {{-- Conteúdo principal --}}
    <div class="ml-64 flex-1 flex flex-col">

        <header>
            <div class="py-10 px-4 sm:px-6 lg:px-12">
                @include('layouts.header')
            </div>
        </header>

        {{-- Conteúdo da página --}}
        <main class="flex-1 mt-6">
            @yield('content')
        </main>

        {{-- Footer alinhado com o conteúdo --}}
        <footer class="bg-white dark:bg-gray-700 text-gray-500 dark:text-blue-400 text-sm py-3 mt-6 shadow-inner">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                Energia do Condomínio
            </div>
        </footer>
    </div>

    @vite('resources/js/app.js')  
</body>
</html>
