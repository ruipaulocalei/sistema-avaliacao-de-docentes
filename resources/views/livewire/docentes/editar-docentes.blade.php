<form class="w-full space-y-4 mx-auto" wire:submit.prevent="editarDocente">
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

    <div class="flex">
        <button class="bg-purple-800 py-2 rounded-md
        w-1/3 text-white uppercase" type="submit">Editar
            Docente</button>
    </div>
</form>
