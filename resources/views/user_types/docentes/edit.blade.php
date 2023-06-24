<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Docente - ' . $user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden
            shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100 mx-auto">
                    <div class="flex flex-col
                    justify-center items-center container w-full mx-auto p-5">
                        <livewire:docentes.editar-docentes :user="$user" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
