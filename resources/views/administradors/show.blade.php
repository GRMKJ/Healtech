<x-admin-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container w-full mt-4 text-gray-900 dark:text-white">
                <h1 class="text-2xl font-semibold mb-6">Detalles del Administrador</h1>

                <!-- Lista de detalles del administrador -->
                <ul class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
                    <li class="py-2 text-gray-800 dark:text-white">
                        <strong>ID:</strong> {{ $administrador->adminID }}
                    </li>
                    <li class="py-2 text-gray-800 dark:text-white">
                        <strong>Nombre:</strong> {{ $administrador->nombre }} {{ $administrador->apaterno }} {{ $administrador->amaterno }}
                    </li>
                    <li class="py-2 text-gray-800 dark:text-white">
                        <strong>Email:</strong> {{ $administrador->user->email }}
                    </li>
                    <li class="py-2 text-gray-800 dark:text-white">
                        <strong>Teléfono:</strong> {{ $administrador->user->phone }}
                    </li>
                </ul>

                <!-- Botón para regresar a la lista de administradores -->
                <a href="{{ route('administradors.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 mt-6 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Volver
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
