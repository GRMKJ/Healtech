<x-guest-layout>
<div class="font-[sans-serif] ">
      <div class="flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <form class="space-y-4 " method="POST" action="{{ route('login') }}">
            @csrf
              <div class="mb-8">
                <img src="{{ asset('img/htlogodark.png') }}" class="hidden dark:block" alt="">
                <img src="{{ asset('img/htlogo.png') }}" class="dark:hidden" alt="">
              </div>

            @if ($errors->has('siempre') || $errors->has('juntos'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong>¡Error!</strong> Credenciales incorrectas, inténtalo de nuevo.
                </div>
            @endif
              <div>
                <label class="text-gray-800 dark:text-white text-sm mb-2 block">Correo</label>
                <div class="relative flex items-center">
                  <input name="siempre" id="siempre" type="text" autocomplete="off" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Correo" />
                  <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                    <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                  </svg>
                </div>
              </div>
              <div>
                <label class="text-gray-800 dark:text-white text-sm mb-2 block">Contraseña</label>
                <div class="relative flex items-center">
                  <input name="juntos" id="juntos" type="password" autocomplete="off" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Contraseña" />
                  <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                    <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                  </svg>
                  <x-input-error :messages="$errors->get('juntos')" class="mt-2" />
                </div>
              </div>

              <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                  <label for="remember-me" class="ml-3 block text-sm text-gray-800 dark:text-white">
                    Recuerdame
                  </label>
                </div>

                <div class="text-sm">
                  <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline font-semibold">
                    ¿Olvidaste tu Contraseña?
                  </a>
                </div>
              </div>

              <div class="!mt-8">
                <x-primary-button type="submit" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                  Iniciar Sesión
                </x-primary-button>
              </div>

              <p class="text-sm !mt-8 text-center dark:text-white text-gray-800">¿Aun no tienes Cuenta? <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Registrarse</a></p>

              <div class="!mt-8">
                <button type="button" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                  Iniciar Sesión con Google
                </button>
              </div>
              <div class="!mt-8">
                <button type="button" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                  Iniciar Sesión con Facebook
                </button>
              </div>
            </form>
        </div>
      </div>
    </div>
</x-guest-layout>
