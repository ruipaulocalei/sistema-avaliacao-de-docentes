<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estudantes') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="p-5 max-w-7xl bg-white shadow-md rounded-md">
            @if (session()->has('message'))
                <div class="border bg-green-100 text-green-600
                border-green-600 font-bold p-2 my-3">
                    {{ session('message') }}</div>
            @endif
            <livewire:estudantes.mostrar-estudantes />
        </div>
    </div>

</x-app-layout>
