<form class="w-full space-y-4" wire:submit.prevent="editarDocente">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        <label for="nome">Nome do docente</label>
        <input type="text" class="block w-2/5 rounded-md p-3
        mt-1 border border-gray-200 focus:outline-none"
            wire:model="nome" value="{{ old('nome') }}" placeholder="Nome do docente" />
        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
    </div>

    <div>
        <label for="email">E-mail do docente</label>
        <input type="email" class="block w-2/5 rounded-md p-3
        mt-1 border border-gray-200 focus:outline-none"
            wire:model="email" value="{{ old('email') }}" placeholder="E-mail do docente" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <label for="departamento">Departamento</label>
        <select wire:model="departamento" value="{{ old('departamento') }}" id="departamento"
            class="block w-2/5 rounded-md p-3
        mt-1 border border-gray-200
        focus:outline-none">
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <label for="Imagem">Foto de Perfil</label>
        <input type="file" class="block w-2/5 rounded-md p-3
        mt-1 border border-gray-200
        focus:outline-none"
            wire:model="imagem_nova" accept="image/*" value="{{ old('imagem') }}" />
        {{--  --}}

        <div class="my-5">
            <img class="w-36 h-36"
            src="{{ asset('storage/docentes/' . $imagem) }}" />
        </div>

        <div class="my-5">
            @if ($imagem_nova)
                Imagem Nova
                <img class="w-36 h-36"
                 src="{{ $imagem_nova->temporaryUrl() }}" />
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagem_nova')" class="mt-2" />
    </div>

    <div class="flex">
        <button class="bg-purple-800 py-2 rounded-md
        w-1/3 text-white uppercase" type="submit">Editar
            Docente</button>
    </div>
</form>
