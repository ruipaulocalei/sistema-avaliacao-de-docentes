<form class="w-full space-y-4 mx-auto" wire:submit.prevent="editarQuestao">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        <label for="nome">Nome da questão</label>
        <input type="text" class="block w-2/5 rounded-md p-3
        mt-1 border border-gray-500 focus:outline-none"
            wire:model="nome" value="{{ old('nome') }}" placeholder="Nome da questão" />
        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
    </div>

    <div class="flex">
        <button class="bg-purple-800 py-2 rounded-md
        w-1/3 text-white uppercase" type="submit">Editar
            Questão</button>
    </div>
</form>
