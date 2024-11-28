<x-opera-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Registrar Paciente</h1>

            <form action="{{ route('pacienteops.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Datos del Usuario -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                    <input type="email" id="email" name="email"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                    <input type="password" id="password" name="password"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                    <input type="text" id="phone" name="phone"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <!-- Datos del Paciente -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                    <input type="text" id="nombre" name="nombre"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="apaterno" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Paterno</label>
                    <input type="text" id="apaterno" name="apaterno"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="amaterno" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Materno</label>
                    <input type="text" id="amaterno" name="amaterno"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Botón de envío -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-opera-layout>
