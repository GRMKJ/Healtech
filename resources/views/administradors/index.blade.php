<x-admin-layout>
<div class="container">
    <h1>Lista de Administradores</h1>
    <a href="{{ route('administradores.create') }}" class="btn btn-primary mb-3">Crear Administrador</a>
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
            @foreach ($administradores as $administrador)
                <tr>
                    <td>{{ $administrador->adminID }}</td>
                    <td>{{ $administrador->nombre }} {{ $administrador->apaterno }} {{ $administrador->amaterno }}</td>
                    <td>{{ $administrador->user->email }}</td>
                    <td>{{ $administrador->user->phone }}</td>
                    <td>
                        <a href="{{ route('administradores.show', $administrador->adminID) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('administradores.edit', $administrador->adminID) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('administradores.destroy', $administrador->adminID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este administrador?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-admin-layout>
