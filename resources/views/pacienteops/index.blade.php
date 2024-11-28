<x-opera-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container w-full mt-4 text-gray-900 dark:text-white">
                <div class="flex justify-between items-center mb-6">
                    <!-- Título -->
                    <h1 class="text-2xl font-semibold">Pacientes Registrados</h1>

                    <!-- Formulario de Búsqueda -->
                    <form action="{{ route('pacienteops.index') }}" method="GET" class="flex items-center space-x-2">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar paciente..."
                                           class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition w-64">
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 transition">
                                        Buscar
                                    </button>
                                </form>

                    <!-- Botón para agregar paciente -->
                    <a href="{{ route('pacienteops.create') }}"
                        class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 flex items-center">
                        <x-heroicon-o-plus></x-heroicon-o-plus>Nuevo Paciente
                    </a>
                </div>

                <!-- Mensajes de éxito -->
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded-lg shadow-md flex items-center justify-between">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="text-white hover:text-gray-200" data-dismiss="alert">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <!-- Tabla de pacientes -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4 text-left">#</th>
                                <th class="py-2 px-4 text-left">Nombre Completo</th>
                                <th class="py-2 px-4 text-left">Email</th>
                                <th class="py-2 px-4 text-left">Teléfono</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-white">
                            @foreach ($pacienteops as $pacienteop)
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-600">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ $pacienteop->nombre }} {{ $pacienteop->apaterno }} {{ $pacienteop->amaterno }}</td>
                                    <td class="py-2 px-4">{{ $pacienteop->user->email }}</td>
                                    <td class="py-2 px-4">{{ $pacienteop->user->phone }}</td>
                                    <td class="py-2 px-4 space-x-2">
                                        <a href="{{ route('pacienteops.show', $pacienteop->pacienteID) }}" class="bg-blue-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-blue-600 inline-flex items-center">
                                            <i class="fas fa-eye mr-2"></i> Ver
                                        </a>
                                        <a href="{{ route('pacienteops.edit', $pacienteop->pacienteID) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-yellow-600 inline-flex items-center">
                                            <i class="fas fa-edit mr-2"></i> Editar
                                        </a>
                                        <form action="{{ route('pacienteops.destroy', $pacienteop->pacienteID) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg shadow-sm hover:bg-red-600 inline-flex items-center" onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">
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
                    {{ $pacienteops->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-opera-layout>
