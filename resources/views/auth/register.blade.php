<x-guest-layout>

    <h1 class="title mt-12 dark:text-white">{{__('Permítenos Conocerte')}}</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidop" :value="__('Apellido Paterno')" />
            <x-text-input id="apellidop" class="block mt-1 w-full" type="text" name="apellidop" :value="old('apellidop')" required autofocus autocomplete="apellidop" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="apellidom" :value="__('Apellido Materno')" />
            <x-text-input id="apellidom" class="block mt-1 w-full" type="text" name="apellidom" :value="old('apellidom')" required autofocus autocomplete="apellidom" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="contraseña" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="contraseña_confirm" :value="__('Confirma tu Contraseña')" />

            <x-text-input id="contraseña_confirm" class="block mt-1 w-full"
                            type="password"
                            name="contraseña_confirm" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('contraseña_confirm')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya tienes cuenta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrate') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
