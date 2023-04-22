<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <!-- component -->
                    <div class="h-screen flex flex-col bg-white">
                        <!-- Card 1 -->
                        <a href="#" class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">
                        <!-- Badge -->
                        <p class="bg-sky-500 w-fit px-4 py-1 text-sm font-bold text-white rounded-tl-lg rounded-br-xl"> Energia </p>
                        <div class="grid grid-cols-6 p-5 gap-y-2">
                            <!-- Profile Picture -->
                            <div>
                                <img src="../img/icon.png" class="max-w-16 max-h-16 rounded-full" />
                            </div>
                            <!-- Description -->
                            <div class="col-span-5 md:col-span-4 ml-4 items-center justify-center">
                                <p class="text-gray-600 font-bold ">{{ __('Serviços Energia') }} </p>
                            </div>
                            <!-- Price -->
                            <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                                <p class="rounded-lg text-sky-500 font-bold bg-sky-100  py-1 px-3 text-sm w-fit h-fit"> $ 5 </p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
