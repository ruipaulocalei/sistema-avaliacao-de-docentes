@extends('layouts.app')
@section('content')
    @if (count($candidatos) > 0)
        <div class="space-y-4 mt-10">
            <h1 class="text-center font-bold text-2xl uppercase animate-slideInFromTop">Candidatos</h1>
            <h1 class="text-right"><a class="px-4 text-white
                bg-green-500 py-2 shadow-lg rounded-lg"
                    href="{{ route('candidatos.create') }}">Novo
                    Candidato</a></h1>
            <table class="min-w-full border shadow-md animate-slideInFromLeft">
                <thead class="bg-slate-900 text-white">
                    <tr class=" px-4">
                        <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">ID</th>
                        <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">Nome</th>
                        <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">Experiência - Em Anos</th>
                        <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">Nível Académico</th>
                        <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">Opções</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($candidatos as $candidato)
                        <tr class="px-4">
                            <td
                                class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                    leading-5 font-medium">
                                {{ $candidato->id }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                    leading-5 font-medium">
                                {{ $candidato->nome }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                    leading-5 font-medium">
                                {{ $candidato->experiencia }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                    leading-5 font-medium">
                                {{ $candidato->nivel_academico->nome }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                     leading-5 font-medium space-x-3">
                                <a href="{{ route('candidatos.edit', ['candidato' => $candidato->id]) }}"
                                    class="text-teal-600 hover:text-teal-800">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="h-screen flex flex-col items-center justify-center">
            <p class="text-center">
                <span class="text-red-600">Não existe candidato por enquanto.</span>
                <a href="{{ route('candidatos.create') }}" class="text-blue-600 underline" href="#">Comece a criar</a>
            </p>
        </div>
    @endif
@endsection
