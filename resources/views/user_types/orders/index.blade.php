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
                        @if (count($orders))
                            @if (Auth::user()->hasRole("estudante"))
                                <h1 class="text-center uppercase font-bold">Meu Tema</h1>
                                <table class="max-w-screen-2xl mx-auto w-full mt-4 mb-5">
                                <thead>
                                    <tr class="p-8">
                                        <th class="py-3 px-4 border-l-2
                                        border-white bg-gray-900 text-white">Tema</th>
                                        <th class="py-3 px-4 border-l-2 
                                        border-white bg-gray-900 text-white">Professor</th>
                                        <th class="py-3 px-4 border-l-2 
                                        border-white bg-gray-900 text-white">Aceito</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td  class="border-b border-gray-900">
                                                {{$order->tema->name}}</td>
                                            <td class="border-b border-gray-900 truncate">
                                                {{$order->professor->name}}
                                            </td>
                                            <td class="border-b border-gray-900">
                                                @if (!$order->aceito)
                                                    <h1 class="text-yellow-600">Aguardando</h1>
                                                @else
                                                    <h1 class="text-green-700">Aceito</h1>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            @else
                                <h1 class="text-center uppercase font-bold">Meus Temas a tutorar</h1>
                                <table class="max-w-screen-2xl mx-auto w-full mt-4 mb-5">
                                    <thead>
                                        <tr class="p-8">
                                            <th class="py-3 px-4 border-l-2
                                            border-white bg-gray-900 text-white">Tema</th>
                                            <th class="py-3 px-4 border-l-2 
                                            border-white bg-gray-900 text-white">Estudante</th>
                                            <th class="py-3 px-4 border-l-2 
                                            border-white bg-gray-900 text-white">Aceito</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td  class="border-b border-gray-900">
                                                    {{$order->tema->name}}</td>
                                                <td class="border-b border-gray-900 truncate">
                                                    {{$order->estudante->name}}
                                                </td>
                                                <td class="border-b border-gray-900">
                                                    @if (!$order->aceito)
                                                        <a href="/orders/{{$order->id}}/aceito"
                                                        class="text-yellow-600">Aceitar</a>
                                                    @else
                                                        <a href="/orders/{{$order->id}}/aceito"
                                                        class="text-red-600">Negar</a>
                                                        <a href="/downloadPDF/{{$order->id}}" 
                                                            target="blank">
                                                            <h1 class="text-green-700">Gerar documento</h1>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @else
                            <h1 class="text-red-600 text-center">
                                Ainda não tens nenhum candidato.</h1>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
