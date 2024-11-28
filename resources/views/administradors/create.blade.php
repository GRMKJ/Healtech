<x-admin-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container w-full mt-4 text-gray-900 dark:text-white">
                <h1 class="text-2xl font-semibold mb-6">Crear Administrador</h1>

                <!-- Formulario de creación de administrador -->
                <form action="{{ route('administradors.store') }}" method="POST" class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="mb-4">
                        <label for="apaterno" class="block text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</label>
                        <input type="text" id="apaterno" name="apaterno" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="mb-4">
                        <label for="amaterno" class="block text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</label>
                        <input type="text" id="amaterno" name="amaterno" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 dark:text-white">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                    </div>

                    <!-- Botón de guardar -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

