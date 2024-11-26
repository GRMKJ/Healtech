<x-app-layout>
<div class="container w-full mt-4">
    <h1 class="mb-4">Pacientes Registrados</h1>

    <!-- Botón para agregar paciente -->
    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-user-plus"></i> Agregar Nuevo Paciente
    </a>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Tabla de pacientes -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $paciente->nombre }} {{ $paciente->apaterno }} {{ $paciente->amaterno }}</td>
                        <td>{{ $paciente->user->email }}</td>
                        <td>{{ $paciente->user->phone }}</td>
                        <td>
                            <!-- Botón para editar -->
                            <a href="{{ route('pacientes.edit', $paciente->pacienteID) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Formulario para eliminar -->
                            <form action="{{ route('pacientes.destroy', $paciente->pacienteID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
</x-app-layout>
