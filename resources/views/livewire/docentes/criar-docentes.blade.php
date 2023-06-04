<form class="md:w-1/2 space-y-3" wire:submit.prevent="criarDocente">
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

    <div class="flex">
        <button class="bg-purple-800 py-2 rounded-md
            w-full text-white uppercase" type="submit">Criar
            Docente</button>
    </div>
</form>
