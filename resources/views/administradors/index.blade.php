<x-admin-layout>
    <div class="flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container  dark:text-white">
                <h1 class="">Lista de Administradores</h1>
                <a href="{{ route('administradors.create') }}" class="btn btn-primary mb-3">Crear Administrador</a>
                <table class="table table-bordered">
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
                                    <a href="{{ route('administradors.show', $administrador->adminID) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('administradors.edit', $administrador->adminID) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('administradors.destroy', $administrador->adminID) }}" method="POST" class="d-inline">
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
        </div>
    </div>
</x-admin-layout>
