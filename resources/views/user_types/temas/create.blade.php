<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-lg">
                    <div class="max-w-screen-sm mx-auto w-full mt-4">
                        <form action="{{ route('tema.store') }}" method="post">
                            @csrf
                            <div class="flex flex-col">
                                <label for="name">Título</label>
                                <input type="text" name="name" 
                                id="name" class="rounded-md">
                            </div>
                            <div class="flex flex-col mt-2">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" 
                                class="rounded-md" cols="25" rows="7"></textarea>
                            </div>
                            <div class="w-full mx-auto text-center">
                                <button type="submit" 
                            class="uppercase bg-green-700
                            px-4 py-2 mt-8 rounded-md shadow-md text-white">Criar tema</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
