<x-admin-layout>
<div class="container">
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
                    <td>{{ $operativo->id }}</td>
                    <td>{{ $operativo->nombre }} {{ $operativo->apaterno }} {{ $operativo->amaterno }}</td>
                    <td>{{ $operativo->user->email }}</td>
                    <td>{{ $operativo->user->phone }}</td>
                    <td>
                        <a href="{{ route('operativos.show', $operativo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('operativos.edit', $operativo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('operativos.destroy', $operativo->id) }}" method="POST" class="d-inline">
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
</x-admin-layout>
