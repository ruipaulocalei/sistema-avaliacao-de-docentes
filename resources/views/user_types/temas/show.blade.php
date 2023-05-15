<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 bg-white border-b border-gray-200 shadow-lg">
                    <div class="max-w-screen-lg mt-4 px-8">
                        @if ($message = Session::get("error"))
                            <h1 class="text-red-600">{{$message}}</h1>
                        @endif
                        <h1 class="font-bold uppercase border-b-2 border-black">{{$tema->name}}</h1>
                        <p class="my-3 text-justify">{{$tema->description}}</p>
                        <p><span class="text-gray-900">Criado por:</span> <span class="font-semibold">
                            {{$tema->user->name}}</span></p>
                        @if (Auth::user()->hasRole("estudante"))
                            <form action="{{route("orders.store")}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{Auth::user()->id}}" name="estudante_id">
                                <input type="hidden" value="{{$tema->user->id}}" 
                                name="professor_id">
                                <input type="hidden" value="{{$tema->id}}"
                                name="tema_id">
                                <button type="submit" class="bg-green-600 py-1 px-2 rounded-md mt-5
                            text-white">Escolher Tema</button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
