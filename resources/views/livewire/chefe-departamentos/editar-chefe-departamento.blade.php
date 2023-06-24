<div class="flex flex-col justify-center items-center w-full mx-auto ml-auto">
    <form class="w-full space-y-4 mx-auto" wire:submit.prevent="editarChefeDepartamento">
        @if (session()->has('error'))
            <h5 class="text-red-500 text-center">{{session('error')}}</h5>
        @endif
        <div class="mt-4">
            <x-input-label for="docente" :value="__('Docente')" />
            <select wire:model="docente" value="{{ old('docente') }}" id="docente"
                class="border-gray-300 dark:border-gray-700
     dark:bg-gray-900 dark:text-gray-300
     focus:border-indigo-500 dark:focus:border-indigo-600
     focus:ring-indigo-500 w-full mt-2
     dark:focus:ring-indigo-600 rounded-md shadow-sm"
                id="docente">
                <option value="">-- Seleccione o Docente --</option>
                @foreach ($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('docente')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="departamento" :value="__('Departamento')" />
            <select wire:model="departamento" value="{{ old('departamento') }}" id="departamento"
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

        <div class="flex">
            <button class="bg-purple-800 py-2 rounded-md
        w-1/3 text-white uppercase" type="submit">Editar Chefe
                de
                Departamento</button>
        </div>
    </form>

</div>
