<x-admin-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container w-full mt-4 text-gray-900 dark:text-white">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold mt-4 mb-6">Lista de Administradores</h1>

                    <form action="{{ route('pacienteops.index') }}" method="GET" class="flex items-center space-x-2">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar Administrador..."
                                           class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition w-64">
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 transition">
                                        Buscar
                                    </button>
                                </f>
                    <!-- Botón para crear un nuevo administrador -->
                    <a href="{{ route('administradors.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 flex items-center">
                        <x-heroicon-o-plus class="mr-2" /> Crear Administrador
                    </a>
                </div>


                <!-- Tabla de administradores -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Nombre</th>
                                <th class="py-2 px-4 text-left">Email</th>
                                <th class="py-2 px-4 text-left">Teléfono</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-white">
                            @foreach ($administradors as $administrador)
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600">
                                    <td class="py-2 px-4">{{ $administrador->adminID }}</td>
                                    <td class="py-2 px-4">{{ $administrador->nombre }} {{ $administrador->apaterno }} {{ $administrador->amaterno }}</td>
                                    <td class="py-2 px-4">{{ $administrador->user->email }}</td>
                                    <td class="py-2 px-4">{{ $administrador->user->phone }}</td>
                                    <td class="py-2 px-4 space-x-2">
                                        <!-- Ver administrador -->
                                        <a href="{{ route('administradors.show', $administrador->adminID) }}" class="bg-blue-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-blue-600 inline-flex items-center">
                                            <i class="fas fa-eye mr-2"></i> Ver
                                        </a>
                                        <!-- Editar administrador -->
                                        <a href="{{ route('administradors.edit', $administrador->adminID) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-yellow-600 inline-flex items-center">
                                            <i class="fas fa-edit mr-2"></i> Editar
                                        </a>
                                        <!-- Eliminar administrador -->
                                        <form action="{{ route('administradors.destroy', $administrador->adminID) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-red-600 inline-flex items-center" onclick="return confirm('¿Estás seguro de eliminar este administrador?')">
                                                <i class="fas fa-trash mr-2"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación (si es necesario) -->
                <div class="mt-4">
                    {{ $administradors->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
