<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Chefe de Departamento') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-12">
        <div class="flex w-full justify-center p-5 bg-white
        shadow-md rounded-md">
            <livewire:chefe-departamentos.criar-chefe-departamento />
        </div>
    </div>

</x-app-layout>
