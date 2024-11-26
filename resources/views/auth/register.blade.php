<x-guest-layout>

    <h1 class="title mt-12 dark:text-white">{{__('Permítenos Conocerte')}}</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apaterno" :value="__('Apellido Paterno')" />
            <x-text-input id="apaterno" class="block mt-1 w-full" type="text" name="apaterno" :value="old('apaterno')" required autofocus autocomplete="apaterno" />
            <x-input-error :messages="$errors->get('apaterno')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="amaterno" :value="__('Apellido Materno')" />
            <x-text-input id="amaterno" class="block mt-1 w-full" type="text" name="amaterno" :value="old('apellidom')" required autofocus autocomplete="amaterno" />
            <x-input-error :messages="$errors->get('amaterno')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telefono')" />
            <x-text-input type="text" class="block mt-1 w-full" name="phone" id="phone" placeholder="" pattern="\+?[0-9]{1,4}?[-.\s]?[0-9]{1,3}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,9}" maxlength="15" value="{{ old('phone') }}"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma tu Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
