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
                    <h1 class="text-center uppercase font-bold">Meus Temas</h1>
                    <h1 class="text-right"><a  class="text-right 
                        bg-green-600 text-white px-3 py-1 rounded-md shadow-lg"
                         href="{{route("tema.create")}}">Novo Tema</a></h1>
                   @if (count($temas) > 0)
                        <table class="max-w-screen-2xl mx-auto w-full mt-4 mb-5">
                        <thead>
                            <tr class="p-8">
                                <th class="py-3 px-4 border-l-2
                                border-white bg-gray-900 text-white">Tema</th>
                                <th class="py-3 px-4 border-l-2 
                                border-white bg-gray-900 text-white">Descrição</th>
                               {{--  <th class="py-3 px-4 border-l-2
                                border-white bg-gray-900 text-white">Criado em:</th> --}}
                                <th class="py-3 px-4 border-l-2
                                border-white bg-gray-900 text-white">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temas as $tema)
                                <tr>
                                    <td  class="border-b border-gray-900">{{Str::words(strip_tags($tema->name), 8)}}</td>
                                    <td class="border-b border-gray-900 truncate">
                                        {{Str::words(strip_tags($tema->description), 4)}}
                                    </td>
                                    {{-- <td class="border-b border-gray-900">
                                        {{$tema->created_at->diffForHumans()}}</td> --}}
                                    <td class="border-b border-gray-900 flex space-x-2">
                                        <a href="{{route("tema.edit", ["tema"=>$tema->id])}}" class="px-4 rounded-sm
                                        bg-blue-700 text-white">Editar</a>
                                        <form action="{{route("tema.destroy", ["tema"=>$tema->id])}}"
                                            method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="px-4 rounded-sm
                                                bg-red-700 text-white">Excluir</button>
                                        </form>
                                        <a href="{{route("tema.show", ["tema"=>$tema->id])}}" 
                                        class="px-4 rounded-sm
                                        bg-green-700 text-white">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{$temas->links()}}
                   @else
                       <h1 class="text-red-600 text-center">
                           Ainda não criaste nenhum tema. Crie um clicando em Novo Tema.</h1>
                   @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
