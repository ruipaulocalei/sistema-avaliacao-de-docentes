<form class="md:w-1/2 space-y-3" wire:submit.prevent="criarDocente" novalidate>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        <label for="nome">Nome do docente</label>
        <input type="text"
            class="block w-full rounded-md p-3
            mt-1 border border-gray-500 focus:outline-none"
            wire:model="nome" value="{{ old('nome') }}" placeholder="Nome do docente" />
        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
    </div>

    <div>
        <label for="email">E-mail do docente</label>
        <input type="email"
            class="block w-full rounded-md p-3
            mt-1 border border-gray-500 focus:outline-none"
            wire:model="email" value="{{ old('email') }}" placeholder="E-mail do docente" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password">Palavra-passe do docente</label>
        <input type="password"
            class="block w-full rounded-md p-3
            mt-1 border border-gray-500 focus:outline-none"
            wire:model="password" value="{{ old('password') }}" placeholder="Palavra-passe" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="mt-4">
        <label for="password_confirmation">Confirmação da Palavra-passe</label>
        <input type="password"
            class="block w-full rounded-md p-3
            mt-1 border border-gray-500 focus:outline-none"
            wire:model="password_confirmation" value="{{ old('password') }}" placeholder="Palavra-passe" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="departamento" :value="__('Departamento')" />
        <select wire:model="departamento"
        value="{{ old('departamento') }}" id="departamento"
            class="border-gray-300 dark:border-gray-700
         dark:bg-gray-900 dark:text-gray-300
         focus:border-indigo-500 dark:focus:border-indigo-600
         focus:ring-indigo-500 w-full mt-2
         dark:focus:ring-indigo-600 rounded-md shadow-sm"
            id="departamento">
            <option value="">-- Seleccione o departamento --</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagem" :value="__('Foto do docente')" />
        <x-text-input id="imagem" class="block mt-1" type="file" wire:model="imagem" accept="image/*" />
        <div class="my-4">
            @if ($imagem)
                <img src="{{ $imagem->temporaryUrl() }}" class="w-44 h-44" />
            @endif
        </div>
        @error('imagem')
            <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
        @enderror
    </div>

    <div class="flex">
        <button class="bg-purple-800 py-2 rounded-md
            w-full text-white uppercase" type="submit">Criar
            Docente</button>
    </div>
</form>
