<x-admin-layout>
<div class="flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container  dark:text-white">
                <h1>Lista de Operativos</h1>
                <a href="{{ route('operativos.create') }}" class="btn btn-primary mb-3">Crear Operativo</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operativos as $operativo)
                            <tr>
                                <td>{{ $operativo->operativoID }}</td>
                                <td>{{ $operativo->nombre }} {{ $operativo->apaterno }} {{ $operativo->amaterno }}</td>
                                <td>{{ $operativo->user->email }}</td>
                                <td>{{ $operativo->user->phone }}</td>
                                <td>
                                    <a href="{{ route('operativos.show', $operativo->operativoID) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('operativos.edit', $operativo->operativoID) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('operativos.destroy', $operativo->operativoID) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este operativo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
