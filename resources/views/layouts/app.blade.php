<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

</head>

<body class="font-sans antialiased">
    <!--MODAL DELETE-->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg">
            <p>Are you sure you want to delete this contract?</p>
            <div class="mt-4 flex justify-end">
                <button id="cancelDelete" class="px-4 py-2 mr-2 bg-gray-300 rounded">Cancel</button>
                <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer
            class="w-full h-8 bg-white
            fixed left-0 bottom-0
            flex justify-center items-center
            text-sm text-gray-500 dark:bg-gray-700 dark:text-blue-400
            ">
            Desenvolvido pela CaseOf Creative Agency
        </footer>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDelete = document.getElementById('cancelDelete');
            const confirmDelete = document.getElementById('confirmDelete');

            deleteButton.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            confirmDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
