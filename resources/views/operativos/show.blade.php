<x-admin-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container w-full mt-4 text-gray-900 dark:text-white">
                <h1 class="text-2xl font-semibold mb-6">Detalles del Operativo</h1>

                <!-- Detalles del operativo -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <ul class="space-y-4 text-gray-800 dark:text-white">
                        <li class="flex justify-between">
                            <span class="font-medium">ID:</span>
                            <span>{{ $operativo->operativoID }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Nombre:</span>
                            <span>{{ $operativo->nombre }} {{ $operativo->apaterno }} {{ $operativo->amaterno }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Email:</span>
                            <span>{{ $operativo->user->email }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Teléfono:</span>
                            <span>{{ $operativo->user->phone }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Botón de volver -->
                <div class="mt-6">
                    <a href="{{ route('operativos.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
