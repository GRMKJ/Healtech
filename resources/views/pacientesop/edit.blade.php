<x-opera-layout>
<div class="container mt-4">
    <h1>Editar Paciente</h1>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario de edición -->
    <form action="{{ route('pacientesop.update', $paciente->pacienteID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <!-- Campo de Nombre -->
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
                </div>

                <!-- Campo de Apellido Paterno -->
                <div class="form-group">
                    <label for="apaterno">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apaterno" name="apaterno" value="{{ old('apaterno', $paciente->apaterno) }}" required>
                </div>

                <!-- Campo de Apellido Materno -->
                <div class="form-group">
                    <label for="amaterno">Apellido Materno</label>
                    <input type="text" class="form-control" id="amaterno" name="amaterno" value="{{ old('amaterno', $paciente->amaterno) }}">
                </div>

                <!-- Campo de Email (Usuario) -->
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $paciente->user->email) }}" required>
                </div>

                <!-- Campo de Teléfono (Usuario) -->
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $paciente->user->phone) }}" required>
                </div>

                <!-- Botones de acción -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('pacientesop.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>
</x-opera-layout>
