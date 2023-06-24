<x-auth-validation-errors class="mb-4" :errors="$errors" />
<form wire:submit.prevent="criarUtilizador" class="text-white" novalidate>
    <!-- Name -->
    <div>
        <x-label class="text-white" for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full text-black" type="text"
        name="name" :value="old('name')" required
            autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label class="text-white" for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Numero SIGU -->
    <div class="mt-4">
        <x-label class="text-white" for="numero_sigu" :value="__('Número do SIGU')" />

        <x-input id="numero_sigu" class="block mt-1 w-full" type="text" name="numero_sigu" :value="old('numero_sigu')"
            required />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label class="text-white" for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block text-black mt-1 w-full" type="password"
            name="password_confirmation" required />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-white
         hover:text-blue-600" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4">
            {{ __('Register') }}
        </x-button>
    </div>
</form>
