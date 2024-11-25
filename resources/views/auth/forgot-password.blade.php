<x-guest-layout>

    <div class="flex justify-center w-full mt-24 mb-5 items-center">
        <img src="{{ asset('img/lockw.svg') }}" alt="Imagen de un Candado" class="hidden dark:block">
        <img src="{{ asset('img/lock.svg') }}" alt="Imagen de un Candado" class="dark:hidden">
    </div>

    <div class="mb-4 font-black dark:text-white text-black text-center text-3xl">
        {{ __('¿Olvidaste tu Contraseña?') }}
    </div>

    <div class="mb-4 dark:text-white text-gray-600 text-xl">
        {{ __('No te preocupes, Cual es el correo de tu cuenta para que te ayudemos a recuperarla') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex w-full items-center justify-center mt-4 mb-24">
            <x-primary-button>
                {{ __('Recuperar mi Contraseña') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
