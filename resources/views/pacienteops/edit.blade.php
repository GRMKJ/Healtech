<x-opera-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Editar Paciente</h1>

            <!-- Mensajes de éxito -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Mensajes de error -->
            @if($errors->any())
                <div class="bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200 p-4 rounded-lg mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario de edición -->
            <form action="{{ route('pacienteops.update', $pacienteop->pacienteID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Campo de Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $pacienteop->nombre) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Campo de Apellido Paterno -->
                    <div>
                        <label for="apaterno" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Paterno</label>
                        <input type="text" id="apaterno" name="apaterno" value="{{ old('apaterno', $pacienteop->apaterno) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Campo de Apellido Materno -->
                    <div>
                        <label for="amaterno" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido Materno</label>
                        <input type="text" id="amaterno" name="amaterno" value="{{ old('amaterno', $pacienteop->amaterno) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Campo de Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $pacienteop->user->email) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Campo de Teléfono -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $pacienteop->user->phone) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-between items-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                        Guardar Cambios
                    </button>
                    <a href="{{ route('pacienteops.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-opera-layout>
