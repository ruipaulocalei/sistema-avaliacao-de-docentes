@extends('layouts.app')
@section('content')
    <h1 class="text-2xl text-center mt-10">Editar dados - {{ $candidato->nome }}</h1>
    <form action="{{ route('candidatos.update', ['candidato' => $candidato->id]) }}" method="POST"
        class="max-w-lg mx-auto my-10 p-6
    w-full bg-gray-800 rounded-lg shadow-lg">
        @csrf
        @method("PUT")
        <div class="mb-5 flex flex-col space-y-3">
            <label for="nome" class="text-white text-sm">Nome do candidato</label>
            <input type="text" name="nome" placeholder="Nome do candidato" @error('nome') is-invalid @enderror
                class="w-full bg-white focus:outline-none p-2 rounded" value="{{ $candidato->nome }}">
            @error('nome')
                <div class="bg-red-100 border border-red-400 text-red-700 rounded-md relative" role="alert">
                    <strong class="font-bold">Erro</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-5 flex flex-col space-y-3">
            <label for="nivel" class="text-white text-sm mb-2">Nível Académico</label>
            <select name="nivel" class="w-full p-2" id="">
                <option disabled selected>Selecciona um nível académico</option>
                @foreach ($niveis as $nivel)
                    <option {{ $candidato->nivel_academico_id == $nivel->id ? 'selected' : '' }}
                        value="{{ $nivel->id }}">
                        {{ $nivel->nome }}</option>
                @endforeach
            </select>
            @error('nivel')
                <div class="bg-red-100 border border-red-400 text-red-700 rounded-md relative" role="alert">
                    <strong class="font-bold">Erro</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="mb-5 flex flex-col">
            <div class="flex flex-col space-y-3">
                <label for="experiencia" class="text-white text-sm mb-2">Experiência de Trabalho</label>
                <input type="number" name="experiencia" min="0" value="{{ $candidato->experiencia }}"
                    placeholder="Experiência de Trabalho" class="w-full bg-white focus:outline-none p-2 rounded">
                @error('experiencia')
                    <div class="bg-red-100 border border-red-400 text-red-700 rounded-md relative" role="alert">
                        <strong class="font-bold">Erro</strong>
                        <span class="block">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="bg-pink-600 w-full py-2
        hover:bg-pink-700 text-white uppercase rounded-lg">Actualizar</button>
    </form>
@endsection
