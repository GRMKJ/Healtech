<x-opera-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Detalles del Paciente</h1>

            <ul class="divide-y divide-gray-300 dark:divide-gray-600">
                <li class="py-3 flex justify-between">
                    <span class="font-semibold text-gray-600 dark:text-gray-300">ID:</span>
                    <span class="text-gray-900 dark:text-white">{{ $pacienteop->pacienteID }}</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span class="font-semibold text-gray-600 dark:text-gray-300">Nombre Completo:</span>
                    <span class="text-gray-900 dark:text-white">
                        {{ $pacienteop->nombre }} {{ $pacienteop->apaterno }} {{ $pacienteop->amaterno }}
                    </span>
                </li>
                <li class="py-3 flex justify-between">
                    <span class="font-semibold text-gray-600 dark:text-gray-300">Email:</span>
                    <span class="text-gray-900 dark:text-white">{{ $pacienteop->user->email }}</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span class="font-semibold text-gray-600 dark:text-gray-300">Teléfono:</span>
                    <span class="text-gray-900 dark:text-white">{{ $pacienteop->user->phone }}</span>
                </li>
            </ul>

            <div class="mt-6">
                <a href="{{ route('pacienteops.index') }}" class="inline-block bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600">
                    <i class="fas fa-arrow-left mr-2"></i> Volver
                </a>
            </div>
        </div>
    </div>
</x-opera-layout>
