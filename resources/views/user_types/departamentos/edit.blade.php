<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Departamento de: ' . $departamento->nome) }}
        </h2>
    </x-slot>

    <div class="mx-auto py-12">
        <div class="flex w-full justify-center p-5 bg-white
        shadow-md rounded-md">
            <livewire:departamentos.editar-departamentos :departamento="$departamento" />
        </div>
    </div>

</x-app-layout>
