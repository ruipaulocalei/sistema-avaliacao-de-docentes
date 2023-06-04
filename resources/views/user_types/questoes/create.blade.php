<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Questão') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="flex justify-center p-5 bg-white
        shadow-md rounded-md">
            <livewire:questoes.criar-questoes />
            <div class="">
            </div>
        </div>
    </div>

</x-app-layout>
